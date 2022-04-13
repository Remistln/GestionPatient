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
            <Block flex>
                <AgendaJours></AgendaJours>
            </Block>
            </Block>

        );
    }
    
}

;

const styles = StyleSheet.create({
    block :
        {
            flexDirection: "column",
            flex: 1,
            padding: 50,
        },
});
