import {Text, Block, Button, Input, Radio} from 'galio-framework';
import {StyleSheet, View} from "react-native";
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

	useEffect(() => {
		setStatus(true)

		let datemtn = new Date
		let formatted_date = datemtn.getFullYear() + "-" + (datemtn.getMonth() + 1) + "-" + datemtn.getDate()

		const tomorrow = new Date(datemtn)
		tomorrow.setDate(tomorrow.getDate() + 1)
		const formatted_tomorrow = tomorrow.getFullYear() + "-" + (tomorrow.getMonth() + 1) + "-" + tomorrow.getDate()

		getVaccinPeremtion(formatted_tomorrow);
	}, [])

	async function getVaccinPeremtion(formatted_tomorrow){

		//A changer quand on aura des vaccins en temps reel
		// let requete = "http://127.0.0.1:8000/api/vaccins?page=1&datePeremption=" + formatted_tomorrow
		let requete = "http://192.168.42.96:8000/api/vaccins?datePeremption=" + formatted_tomorrow

		fetch(requete, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
				letVaccinPeremptionList(res)

			console.log("le resultat")
			console.log(vaccinPeremptionList)
		}).catch(error => console.log(error))
	}

	function ckeckInfo(chosenVaccin) {

		if (birthDate !== "") {
			// console.log("http://192.168.1.14:8000/api/type_vaccins?label=" + chosenVaccin)
			console.log("une date")
			getTypeVaccin(chosenVaccin)
		}else{
			console.log("pas de date")
			setStatus(true)
		}
	}

	async function getTypeVaccin(chosenVaccin) {
		console.log("je suis dans typevaccin")
		fetch("http://192.168.42.96:8000:8000/api/type_vaccins?label=" + chosenVaccin, {
			headers: {
				'Accept': 'application/json'
			}
		})
			.then(response => {
				return response.json();
			}).then(res => {
			checkAge(res[0])
			console.log("fetch reussi")
		}).catch(error => console.log("ERROR" + error))
		console.log("http://192.168.42.96:8000:8000/api/type_vaccins?label=" + chosenVaccin)
	}

	function checkAge(Vaccin) {
		if (age >= Vaccin.ageMin && age <= Vaccin.ageMax) {
			getNumberVaccin(Vaccin.label)
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
				// console.log(item)
				setDeleteItem(item.id)
				// console.log(item.id)
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

	async function deleteVaccin(){
		console.log("suppression du " + deleteItem)
		fetch('http://192.168.42.96:8000:8000/api/vaccins/' + deleteItem, {
			method: 'DELETE',
		}).then(response => {
			response.json()
		})
	}


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
							console.log(today.getFullYear().toString() - new Date(date).getFullYear().toString())
						}}
					/>
				</Block>

				<Block style={styles.vaccins}>
					<Text h5>Vaccins : </Text>
					<Radio label="Pfizer" color="primary"
					       onChange={() => {
						       ckeckInfo("Pfizer")
					       }}/>
					<Radio label="AstraZeneca" color="primary" checked="false"
					       onChange={() => {
						       ckeckInfo("AstraZeneca")
					       }}/>

				</Block>
			</Block>

			<Block style={styles.valider}>
				<Text>{age} ans</Text>
				<Text>{message}</Text>
				<Text>{status}</Text>
				<Button disabled={status} onPress={deleteVaccin}>Valider</Button>
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
		flex: 3,
		textAlign: "center",
		marginTop: 3,
		fontWeight: 'bold'
	},
	TextTitre: {
		fontWeight: "bold",
		textAlign: "center"
	},
	date: {
		flex: 2,
		justifyContent: 'space-evenly'

	},
	vaccins: {
		flex: 2,
		justifyContent: 'space-evenly',
		marginTop: 40
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
		height: 20
	},
});