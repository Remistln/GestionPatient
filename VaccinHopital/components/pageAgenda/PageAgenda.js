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
            <Block style = {styles.block}>
                <Block style = {styles.boutton}>
                    <Button>Retour</Button>
                </Block>
            

                <Block style = {styles.agenda}>
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
    },

    boutton :
    {
        flex: 1,
    },

    agenda :
    {
        flex: 4,
        marginHorizontal: 20,
        marginBottom: 45,
    },
});
