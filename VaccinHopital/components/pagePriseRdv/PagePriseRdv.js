import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import RNPickerSelect from 'react-native-picker-select';
import DatePicker from 'react-native-datepicker';
import moment from "moment";

let premierChargement = false;
let listeChargee = false;

async function getVaccinListe()
{
    if (premierChargement){
        return;
    }
    premierChargement = true;
    var ApiHeaders = new Headers({
        'Content-Type': 'application/ld+json'
    });

    // ip de l'ordinateur où se trouve le serveur
    const ip ="192.168.42.96:8000";

    const url = 'http://' + ip + '/api/vaccins';
    await fetch(url, { method: 'GET', headers: ApiHeaders,}) 
    .then(response => response.json())
    .then((data) => {
        let vaccinListe = []
        for (const vaccin of data['hydra:member'])
        {
            vaccinListe.push(vaccin);
            
        };
        listeChargee = true;
        return vaccinListe;
    })
}

const vaccinListe = getVaccinListe();

export default class PagePriseRdv extends Component 
{
    constructor({navigation})
    {
        super({navigation});
        this.placeholderDate = this.formatToday();
        this.state = {
            jour: 5,
            mois: "Février",
            annee: 2022,

            nom:"",
            prenom:"",
            dateNaissance: this.placeholderDate,

            horaires: [
                {label: "une heure", value: "une heure"},
                {label: "une autre heure", value: "une autre heure"},
                ],
            heure : "la première heure",

            vaccins : [
                {label: "Pfizer", value: "Pfizer"},
                {label: "Astra Zeneca", value: "Astra Zeneca"},
                {label: "Moderna", value: "Moderna"},
            ],
            vaccin: "la picure",
        };

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
    }

    validation()
    {
        return (this.state.nom !== "" && this.state.prenom !== "" && this.state.heure !== "la première heure" && this.state.vaccin !== "la picure" && this.state.dateNaissance !== this.placeholderDate);
    }

    async enregistrement()
    {


        this.props.navigation.navigate('AgendaVaccinations');
    }
    render()
    {
    return(
        <Block style={ styles.block}> 
            <Block style={ styles.block}>
                <Block style = {styles.date } >
                    <Text h4>Date :</Text>
                </Block>
                <Block  style={ styles.centrer}>
                    <Text style={ styles.centrer} h5>{this.state.jour}-{this.state.mois}-{this.state.annee}</Text>
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