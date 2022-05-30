import {Text, Block, Button, Input, Radio} from 'galio-framework';
import {Alert, StyleSheet, View} from "react-native";
import DatePicker from "react-native-datepicker";
import {useEffect, useState} from "react";


export default function PageSansRdv({navigation}) {
	const [birthDate, setBirthDate] = useState("");
	const [age, setAge] = useState("");
	const [today, setToday] = useState(new Date);
	const [message, setMessage] = useState("")
	const [vaccinPeremptionList, letVaccinPeremptionList] = useState([]);
	const [status, setStatus] = useState(false)
	const [deleteItem, setDeleteItem] = useState()

	let ip = "10.60.44.36:8000" //remi a epsi

	useEffect(() => {

		let ip = "10.60.44.36:8000" //remi a epsi
		//let ip = "192.168.1.14:8000" //remi chez lui
		//let ip = "127.0.0.1:8000"
		//let ip = "172.20.10.9:8000" //aya
		//let ip = "192.168.42.96:8000"


		setStatus(true)

		let datemtn = new Date
		let formatted_date = datemtn.getFullYear() + "-" + (datemtn.getMonth() + 1) + "-" + datemtn.getDate()

		const tomorrow = new Date(datemtn)
		tomorrow.setDate(tomorrow.getDate() + 1)
		const formatted_tomorrow = tomorrow.getFullYear() + "-" + (tomorrow.getMonth() + 1) + "-" + tomorrow.getDate()

		getVaccinPeremtion(formatted_tomorrow, ip);
	}, []) ;


	async function getVaccinPeremtion(formatted_tomorrow, ip){

		//A changer quand on aura des vaccins en temps reel

		let requete = "http://" + ip + "/api/vaccins?datePeremption=" + formatted_tomorrow

		fetch(requete, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
				letVaccinPeremptionList(res)
		}).catch(error => console.log(error))
	}

	function ckeckInfo(chosenVaccin, ip) {

		if (birthDate !== "") {
			getTypeVaccin(chosenVaccin, ip)
		}else{
			setStatus(true)
		}
	}

	async function getTypeVaccin(chosenVaccin, ip) {

		fetch("http://" + ip + "/api/type_vaccins?label=" + chosenVaccin, {

			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
			checkAge(res[0])
		}).catch(error => console.log("ERROR" + error))


	}

	function checkAge(Vaccin) {
		if (age >= Vaccin.ageMin && age <= Vaccin.ageMax) {
			getNumberVaccin(Vaccin.label, ip)
		} else {
			setMessage("Vous n'avez pas l'age pour utiliser ce vaccin (Entre " + Vaccin.ageMin + " et " + Vaccin.ageMax + " ans)")
			setStatus(true)
		}
	}

	function getNumberVaccin(chosenVaccin){
		let numberVaccinsLeft = 0

		vaccinPeremptionList.map(item => {
			if (item.type.label === chosenVaccin && item.reserve === false){
				numberVaccinsLeft++
				setDeleteItem(item.id)
			}
		} )

		if (numberVaccinsLeft > 0){
			setMessage("Vaccins restants : " + numberVaccinsLeft)
			setStatus(false)
		}else{
			setMessage("Il n'y a plus de vaccins")
			setStatus(true)
		}
	}

	async function deleteVaccin(ip){
	    fetch('http://' + ip + '/api/vaccins/' + deleteItem, {
			method: 'DELETE',
		}).then(response => {
			response.json()
		    alertRdvPris()
		})
	}



	let  alertRdvPris = () =>
		Alert.alert(
			"Status Rdv",
			"Prise de vaccin sans rendez-vous enregistrée! ",
			[
				{ text: "OK", onPress: () => navigation.navigate("PageAcceuil") }
			]
		);

	return (
		<Block style={styles.block}>
			<Block flex row={false}>

				<Block style={styles.titre}>
					<Text style={styles.TextTitre} h4>Vaccins sans rendez-vous</Text>
				</Block>

				<Block style={styles.date}>
					<Text h5>Date de Naissance : </Text>
					<DatePicker
						style={styles.datePicker}
						date={birthDate}
						mode="date"
						locale="fr"
						placeholder="Date"
						format="YYYY-MM-DD"
						minDate="1900-01-01"
						confirmBtnText="Confirmer"
						cancelBtnText="Annuler"
						customStyles={{
							dateInput: {
								backgroundColor: 'white',
								borderWidth: 1,
								borderColor: 'black',
							},
						}}
						showIcon={false}
						onDateChange={(date) => {
							setBirthDate(date);
							setAge(today.getFullYear() - new Date(date).getFullYear())
						}}
					/>
				</Block>

				<Block>
					<Text style={styles.vaccins} h5>Vaccins : </Text>
					<Radio label="Pfizer" color="primary"
					       onChange={() => {
						       ckeckInfo("Pfizer", ip)
					       }}/>
					<Radio label="AstraZeneca" color="primary" checked="false"
					       onChange={() => {
						       ckeckInfo("AstraZeneca", ip)
					       }}/>
					<Radio label="Moderna" color="primary" checked="false"
						   onChange={() => {
							   ckeckInfo("Moderna", ip)
						   }}/>

				</Block>
			</Block>

			<Block style={styles.valider}>
				<Text>{message}</Text>
				<Text>{status}</Text>
				<Button disabled={status} onPress={() => {deleteVaccin(ip)}}>Valider</Button>
			</Block>

		</Block>


	);
}

const styles = StyleSheet.create({

	block:
		{
			flexDirection: "column",
			flex: 5,
			padding: 50,
		},
	titre: {
		justifyContent: 'space-evenly',
		textAlign: "center",
		fontWeight: 'bold'
	},
	TextTitre: {
		fontWeight: "bold",
		textAlign: "center"
	},
	date: {
		flex: 2,
		justifyContent: 'space-evenly',
		marginTop : 50

	},
	vaccins: {
		marginTop: 30
	},
	valider: {
		flex: 1,
		marginBottom: 10,
		justifyContent: 'space-evenly',
		alignItems: 'center',
	},
	datePicker: {
		flex: 1,
		alignItems: 'center',
		justifyContent: 'center',
		marginTop: 20,
		padding: 16,
		height: 20,
		width: 300,
	},
});