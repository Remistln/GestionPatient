import { Text, Block, Button, Input } from 'galio-framework';
import {Alert, StyleSheet, ScrollView, SafeAreaView} from 'react-native';
import { Component } from 'react';
import RNPickerSelect from 'react-native-picker-select';
import DatePicker from 'react-native-datepicker';
import moment from "moment";

const moisListe = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

let Pfizer = true;
let Astra = true;
let Moderna = true;

// Page de prise de rendez-vous
// Elle affiche un formulaire a remplir afin de prendre un rendez-vous
// Elle selectionne les type de vacins disponible en fonction des vaccins disponible dans l'API ainsi que l'age du patient
export default class PagePriseRdv extends Component 
{
    constructor({navigation, route})
    {
        super({navigation, route});
        this.placeholderDate = this.formatToday();
        this.listeVacins = route.params.vaccinListe;
        this.dateChoisie = route.params.choisieDate;

        this.state = {
            jour : route.params.jour,
            mois : route.params.mois,
            annee : route.params.annee,
            nom:"",
            prenom:"",
            dateNaissance: this.placeholderDate,

            horaires: [
                {label: "9h00", value: "09:00:00"},
                {label: "9h30", value: "09:30:00"},
                {label: "10h00", value: "10:00:00"},
                {label: "10h30", value: "10:30:00"},
                {label: "11h00", value: "11:00:00"},
                {label: "11h30", value: "11:30:00"},
                {label: "13h00", value: "13:00:00"},
                {label: "13h30", value: "13:30:00"},
                {label: "14h00", value: "14:00:00"},
                {label: "14h30", value: "14:30:00"},
                {label: "15h00", value: "15:00:00"},
                {label: "15h30", value: "15:30:00"},
                {label: "16h00", value: "16:00:00"},
                {label: "16h30", value: "16:30:00"},
                {label: "17h00", value: "17:00:00"},
                {label: "17h30", value: "17:30:00"},
                {label: "18h00", value: "18:00:00"},
                {label: "18h30", value: "18:30:00"},
                ],
            heure : "la première heure",

            vaccins : this.vaccinsDisponibles(route.params.jour ,route.params.mois ,route.params.annee),
            typeVaccin : "le type",
            vaccin: "la picure",
        };


    };

    // Selectionne les type de vaccins disponibles en fonction des vaccins de l'API
    vaccinsDisponibles(jour, mois, annee)
    {

        let typeVaccins = [];
        for (const vaccin of this.listeVacins)
        {
            let dateDePeremption = vaccin.datePeremption;
            let dateRdv = new Date(annee,mois-1,jour+1,0,0,0);
            let Peremption = new Date(dateDePeremption)
            if (Peremption > dateRdv )
            {
                if (Pfizer && vaccin.type.label === "Pfizer")
                {
                    typeVaccins.push({label: "Pfizer", value: "Pfizer"});
                    Pfizer = false;
                }
                if (Astra && vaccin.type.label === "AstraZeneca")
                {
                    typeVaccins.push({label: "Astra Zeneca", value: "AstraZeneca"});
                    Astra = false;
                }
                if (Moderna && vaccin.type.label === "Moderna")
                {
                    typeVaccins.push({label: "Moderna", value: "Moderna"});
                    Moderna = false;
                }
            };
        };
        return typeVaccins ;
    };

    // Filtre les type de vaccins disponible en fontion de l'age
    typeVaccinParAge(date)
    {
        const naissance = date.split('-');
        const aujourdhuis = new Date();
        const age = aujourdhuis.getFullYear() - naissance[2];
        if (age >= 5 && age <= 20){Pfizer = true;}
        else {Pfizer = false;}
        if (age >= 20) {Astra = true;}
        else {Astra = false;}
        if (age >= 30) {Moderna = true;}
        else {Moderna = false;}
    
        this.setState({vaccins : this.vaccinsDisponibles(this.state.jour,this.state.mois, this.state.annee)})
        
    };

    // retourne la date d'aujourd'hui sous un format jj-mm-yyyy ou j-mm-yyyy
    formatToday()
    {
        let aujourdhuis = new Date();
        let placeholderDate
        if (aujourdhuis.getMonth()<9){
            placeholderDate = aujourdhuis.getDate().toString() +"-0"+ (aujourdhuis.getMonth() + 1).toString() +"-"+ aujourdhuis.getFullYear().toString();
        }
        else{
            placeholderDate = aujourdhuis.getDate().toString() +"-"+ (aujourdhuis.getMonth() + 1).toString() +"-"+ aujourdhuis.getFullYear().toString();
        }
        return placeholderDate;
    };

    // sauvergarde un des vaccins du type selectionnée dans le state "vaccin"
    loadVaccin(typeVaccin)
    {
        for (const vaccin of this.listeVacins)
        {
            if (vaccin.type.label ===  typeVaccin)
            {
                this.setState({vaccin: vaccin.id});
                break;
            };
        };
    }

    // Vérifie si le formulaire a été entièrement remplit
    validation()
    {
        return (this.state.nom !== "" && this.state.prenom !== "" && this.state.heure !== "la première heure" && this.state.vaccin !== "la picure" && this.state.dateNaissance !== this.placeholderDate);
    };

    alertRdvPris = () =>
        Alert.alert(
            "Status Rdv",
            "Le rendez-vous est enregistré! ",
            [
                { text: "OK", onPress: () => this.props.navigation.navigate("AgendaVaccinations") }
            ]
        );

    alertFormulaireIncomplet = () =>
        Alert.alert(
            "Status Formulaire",
            "Le formulaire n'est pas complet! ",
            [
                { text: "OK" }
            ]
        );

    // enregistre le rendez-vous dans l'API
    async enregistrement()
    {
        var ApiHeadersPost = new Headers({
            'Content-Type': 'application/ld+json'
        });
        var ApiHeadersPatch = new Headers({
            'Content-Type': 'application/merge-patch+json'
        });

        // ip de l'ordinateur où se trouve le serveur
        //const ip = "10.60.44.36:8000" //remi a epsi
        //const ip = "192.168.1.14:8000" //remi chez lui
        const ip = "192.168.42.96:8000" // ip gaëtan
        //const ip ="172.20.10.9:8000"; //ip aya
        //const ip ="192.168.42.96:8000"; //ip aya
        
        const urlRdv = 'http://' + ip + '/api/rendez_vouses';

        const iriVaccin = "/api/vaccins/" + this.state.vaccin.toString();
        const urlVaccin = 'http://' + ip + iriVaccin;

        const date = new Date(this.state.annee,this.state.mois - 1,this.state.jour+1,0,0,0);

        console.log(date)
        const Rdv = {
            vaccin: iriVaccin,
            Date: date,
            nom: this.state.nom,
            prenom: this.state.prenom,
            heure: this.state.heure,
            typeVaccin: this.state.typeVaccin
        };

        const vaccinAJour = {
            reserve: true
        }
        await fetch(urlRdv, { method: 'POST', headers: ApiHeadersPost, body: JSON.stringify(Rdv)})
            .then(
                await fetch(urlVaccin, {method: 'PATCH', headers: ApiHeadersPatch, body: JSON.stringify(vaccinAJour)})
                    .then(this.props.navigation.navigate('AgendaVaccinations'))
            );
    };

    // Affichage
    render()
    {
    return(
        <SafeAreaView>
        <ScrollView>
        <Block style={ styles.block}> 
            <Block>
                <Block style = {styles.date} >
                    <Text h5>Date :</Text>
                </Block>
                <Block  style={ styles.centrer}>
                    <Text style={ styles.centrer} h5>{this.dateChoisie}</Text>
                </Block>
            </Block>


                <Block style = {styles.commun} >
                    <Text h5>Nom :</Text>
                </Block>
                <Block>
                    <Input style={ styles.input} onChangeText={text => {this.setState({nom: text})}}></Input>
                </Block>



                <Block style = {styles.commun}>
                    <Text h5>Prénom :</Text>
                </Block>
                <Block s>
                    <Input style={ styles.input} onChangeText={text => {this.setState({prenom: text})}}></Input>
                </Block>



                <Block style = {styles.commun} >
                    <Text h5>Date de Naissance :</Text>
                </Block>
                <Block style = {styles.centrer }>
                    <Text style = {styles.centrer } h5>{this.state.dateNaissance}</Text>
                    <Block style={styles.container}>
                        <DatePicker
                                date={this.setState.dateNaissance}
                                androidMode="spinner"
                                mode="date"
                                locale="fr"
                                placeholder="DD/MM/YYYY"
                                format="DD-MM-YYYY"
                                minDate={'01-01-1900'}
                                maxDate={moment().format('DD-MM-YYYY')}
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
                                style={styles.boutonDate}
                                onDateChange={(date) => {
                                    this.setState({dateNaissance: date});
                                    this.typeVaccinParAge(date);
                                }}
                            />
                    </Block>
                </Block>



                <Block style = {styles.commun}>
                    <Text h5>Heure de Passage :</Text>
                </Block>
                <Block style = {styles.centrer } >
                    <RNPickerSelect
                    items={this.state.horaires}
                    onValueChange = {
                        value => this.setState( { heure: value} )
                    }
                    value = {this.state.heure}
                    style={pickerSelectStyles}
                    />
                </Block>



                <Block style = {styles.commun}>
                    <Text h5>Vaccins :</Text>
                </Block>
                <Block style = {styles.centrer } >

                    <RNPickerSelect
                        items={this.state.vaccins}
                        onValueChange = {value => {
                            this.setState( { typeVaccin: value} );
                            if (value !== null){
                                this.loadVaccin(value);
                            }
                        }
                        }
                        value = {this.state.typeVaccin}
                        style={pickerSelectStyles}

                    />
                </Block>


            <Block style={ styles.valider}  >
                <Button  onPress={ ()=>{
                    if (this.validation())
                    {
                        this.enregistrement() && this.alertRdvPris();
                    }
                    else
                    {
                        this.alertFormulaireIncomplet();
                    }}
                }>Valider</Button>
            </Block>

        </Block>
        </ScrollView>
        </SafeAreaView>
    )
        
    };
};

// Style de l'affichage
const styles = StyleSheet.create({
    block :
    {
        flexDirection: "column",
        flex: 1,
        marginHorizontal: 5,
        marginLeft: 35,
        marginRight: 35,
        marginTop : 20,
    },

    select :
    {
        color: 'black',
    },

    input :
    {
        height: 40,
    },

    boutonDate:
    {
        width: 300,
    },
    date :
    {
        textAlign : "right",
    },
    centrer :
    {
        alignItems : "center",
        alignContent : "center",
        textAlign : "center"
    },
    valider  :
        {
            alignItems : "center",
            marginTop : "12%",
        },
    commun :
        {
            marginTop : "10%",
       }


});

// Style particulier des picker en fonction des OS
const pickerSelectStyles = StyleSheet.create({
    inputIOS: {
      fontSize: 16,
      paddingVertical: 12,
      paddingHorizontal: 10,
      borderWidth: 1,
      borderColor: 'gray',
      borderRadius: 4,
      color: 'black',
      paddingRight: 30, // to ensure the text is never behind the icon
    },
    inputAndroid: {
      fontSize: 16,
      paddingHorizontal: 10,
      paddingVertical: 8,
      borderWidth: 0.5,
      borderColor: 'purple',
      borderRadius: 8,
      color: 'black',
      paddingRight: 30, // to ensure the text is never behind the icon
    },
  });