import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import AgendaJours from './agendaJours/AgendaJours';
import AgendaMois from './agendaMois/AgendaMois';

export default class PageAgenda extends Component {
    constructor()
    {
        super();
        this.state = {
            identifiant: '',
            mdp: '',
        }
    };

    agenda()
    {
        return(
            <AgendaJours></AgendaJours>
        );
    }//<AgendaMois></AgendaMois>

    render (){
        return(
            <Block style = {styles.block}>
                <Block style = {styles.boutton}>
                    <Button>Retour</Button>
                </Block>
            

                <Block style = {styles.agenda}>
                    {this.agenda()}
                </Block>
            </Block>

        );//
    };   
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
