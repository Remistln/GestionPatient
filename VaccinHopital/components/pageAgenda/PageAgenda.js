import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import AgendaJours from './agendaJours/AgendaJours';

export default class PageAgenda extends Component {
    constructor()
    {
        super();
        this.state = {
            identifiant: '',
            mdp: '',
        }
    };
    render (){
        return(
            <Block  style = {styles.block}>
            <Button>Retour</Button>

            <Text>Agenda Vaccinations</Text>
            <AgendaJours></AgendaJours>

            </Block>

        );
    }
    
}



const styles = StyleSheet.create({
    block :
        {
            flexDirection: "column",
            flex: 5,
            padding: 50,
        },
});
