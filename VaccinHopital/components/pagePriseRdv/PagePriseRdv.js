import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import RNPickerSelect from 'react-native-picker-select';
import DatePicker from 'react-native-datepicker';
import moment from "moment";

const moisListe = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];




export default class PagePriseRdv extends Component 
{
    constructor({navigation, route})
    {
        super({navigation, route});
        this.placeholderDate = this.formatToday();
        this.listeVacins = route.params.vaccinListe;
        this.state = {
            jour: route.params.jour,
            mois: route.params.mois,
            annee: route.params.annee,

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

            vaccins : this.vaccinsDisponibles(route.params.jour, route.params.mois, route.params.annee),
            typeVaccin : "le type",
            vaccin: "la picure",
        };

    };

    vaccinsDisponibles(jour, mois, annee)
    {
        let typeVaccins = [];
        let pfizer = true;
        let astra = true;
        let moderna = true;
        for (const vaccin of this.listeVacins)
        {
            var dateDePeremption = new Date(vaccin.datePeremption);
            var dateRdv = new Date(annee, mois, jour,0,0,0,0);
            if (dateDePeremption > dateRdv)
            {
                if (pfizer && vaccin.type.label == "Pfizer")
                {
                    typeVaccins.push({label: "Pfizer", value: "Pfizer"});
                    pfizer = false;
                }
                if (astra && vaccin.type.label == "AstraZeneca")
                {
                    typeVaccins.push({label: "Astra Zeneca", value: "AstraZeneca"});
                    astra = false;
                }
                if (moderna && vaccin.type.label == "Moderna")
                {
                    typeVaccins.push({label: "Moderna", value: "Moderna"});
                    moderna = false;
                }

            };
        };
        return typeVaccins ;
    };

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

    loadVaccin()
    {
        for (const vaccin of this.listeVacins)
        {
            if (vaccin.type.label ==  this.state.typeVaccin)
            {

            };
        };
    }

    validation()
    {
        return (this.state.nom !== "" && this.state.prenom !== "" && this.state.heure !== "la première heure" && this.state.vaccin !== "la picure" && this.state.dateNaissance !== this.placeholderDate);
    };

    async enregistrement()
    {
        var ApiHeaders = new Headers({
            'Content-Type': 'application/ld+json'
        });
        // ip de l'ordinateur où se trouve le serveur
        const ip ="192.168.42.96:8000";
        const url = 'http://' + ip + '/api/rendez_vouses';

        const date = new Date(this.state.annee, this.state.mois, this.state.jour,0,0,0,0);

        const Rdv = {
            vaccin: this.state.vaccin, 
            Date: date.toString(),
            nom: this.state.nom,
            prenom: this.state.prenom,
            heure: this.state.heure,
        };

        await fetch(url, { method: 'POST', headers: ApiHeaders, body: JSON.stringify(Rdv)}) 
            .then(this.props.navigation.navigate('AgendaVaccinations'));

    };


    render()
    {
    return(
        <Block style={ styles.block}> 
            <Block style={ styles.block}>
                <Block style = {styles.date } >
                    <Text h4>Date :</Text>
                </Block>
                <Block  style={ styles.centrer}>
                    <Text style={ styles.centrer} h5>{this.state.jour}-{moisListe[this.state.mois]}-{this.state.annee}</Text>
                </Block>
            </Block>

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Nom :</Text>
                </Block>
                <Block>
                    <Input style={ styles.input} onChange={text => {this.setState({nom: text})}}></Input>
                </Block>
            </Block>

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Prénom :</Text>
                </Block>
                <Block>
                    <Input style={ styles.input} onChange={text => {this.setState({prenom: text})}}></Input>
                </Block>
            </Block>

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Date de Naissance :</Text>
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
                                }}
                            />
                    </Block>
                </Block>
            </Block>

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Heure de Passage :</Text>
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
            </Block>

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Vaccins :</Text>
                </Block>
                <Block style = {styles.centrer } >

                    <RNPickerSelect
                        items={this.state.vaccins}
                        onValueChange = {
                            value => this.setState( { vaccin: value} )
                        }
                        value = {this.state.vaccin}
                        style={pickerSelectStyles}
                        
                    />
                </Block>
            </Block>

            <Block style={ styles.centrer}>
                <Button style={ styles.valider} onPress={ ()=>{
                    if (this.validation())
                    {
                        this.enregistrement();
                    };}
                }>Valider</Button>
            </Block>

        </Block>
    )
        
    };
};

const styles = StyleSheet.create({
    block :
    {
        flexDirection: "column",
        flex: 1,
        marginHorizontal: 5,

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
            marginBottom : "15%",
            alignItems : "center",

        }


});

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