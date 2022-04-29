import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import RNPickerSelect from 'react-native-picker-select';

export default class PagePriseRdv extends Component 
{
    constructor({navigation})
    {
        super({navigation});
        this.state = {
            jour: 1,
            mois: "janvier",
            annee: 0,

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

    render()
    {
    return(
        <Block> 
            <Block>
                <Block>
                    <Text>Date :</Text>
                </Block>
                <Block>
                    <Text>{this.state.jour} / {this.state.mois} / {this.state.annee}</Text>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Nom :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Prénom :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Date de Naissance :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Heure de Passage : {this.state.heure}</Text>
                </Block>
                <Block>
                    <RNPickerSelect
                    items={this.state.horaires}
                    onValueChange = {
                        value => this.setState( { heure: value} )
                    }
                    value = {this.state.heure}
                    style={styles.select}
                    />
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Vaccins : {this.state.vaccin}</Text>
                </Block>
                <Block>
                <RNPickerSelect
                    items={this.state.vaccins}
                    onValueChange = {
                        value => this.setState( { vaccin: value} )
                    }
                    value = {this.state.vaccin}
                    style={styles.select}
                    />
                </Block>
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
    },

    select :
    {
        color: 'black',
    },
});