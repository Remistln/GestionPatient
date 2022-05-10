import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import RNPickerSelect from 'react-native-picker-select';
import DatePicker from 'react-native-datepicker';



export default class PagePriseRdv extends Component 
{
    constructor()
    {
        super();
        this.placeholderDate = this.formatToday();
        this.state = {
            jour: 1,
            mois: "janvier",
            annee: 0,

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
            vaccin: "la picure"
        }
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
        return (this.state.nom != "" && this.state.prenom != "" && this.state.heure != "la première heure" && this.state.vaccin != "la picure" && this.state.dateNaissance != this.placeholderDate);
    }

    render()
    {
    return(
        <Block style={ styles.block}> 
            <Block style={ styles.block}>
                <Block >
                    <Text h4>Date :</Text>
                </Block>
                <Block style={ styles.ligne}>
                    <Text h5>{this.state.jour}-{this.state.mois}-{this.state.annee}</Text>
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
                <Block style={ styles.ligne}>
                    <Text h5>{this.state.dateNaissance}</Text>
                    <DatePicker
                            date={this.setState.dateNaissance}
                            mode="date"
                            locale="fr"
                            placeholder="Choisir"
                            format="DD-MM-YYYY"
                            minDate="01-01-1900"

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

            <Block style={ styles.block}>
                <Block>
                    <Text h4>Heure de Passage :</Text>
                </Block>
                <Block style={ styles.ligne}>
                    <Text h5>{this.state.heure}</Text>
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
                <Block style={ styles.ligne}>
                    <Text h5>{this.state.vaccin}</Text>
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

            <Block style={ styles.block}>
                <Button onPress={ ()=>{
                    if (this.validation())
                    {};}
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

    ligne :
    {
        flexDirection: "row",
        flex: 1,
    },
    select :
    {
        color: 'black',
    },

    input :
    {
        height: 30,
    },

    boutonDate:
    {
        width: 70,
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