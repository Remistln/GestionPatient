import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import AgendaJours from './agendaJours/AgendaJours';
import AgendaMois from './agendaMois/AgendaMois';

export default class PageAgenda extends Component {
    constructor()
    {
        super();

        const laDate = new Date();

        this.state = {
            annee: laDate.getFullYear(),
            mois: laDate.getMonth(),
            choisirMois : false,
        }
    };

    agenda()
    {
        if (this.state.choisirMois) 
        {
            return(
                <AgendaMois anneeInitiale = {this.state.annee}></AgendaMois>
            );
        } else
        {
            return(
                <AgendaJours moisInitial = {this.state.mois} anneeInitiale = {this.state.annee} ></AgendaJours>
            );
        };
        
    }
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
