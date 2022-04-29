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

        this.agenda_handlers = {
            choixDuMois_handler: this.choixDuMois_handler.bind(this),
        }

        this.choixMois_handlers = {
            mois_handler: this.mois_handler.bind(this),
            annee_handler: this.annee_handler.bind(this),
            choixDuMois_handler: this.choixDuMois_handler.bind(this),
        }
    };

    choixDuMois_handler()
    {
        this.setState({choisirMois: ! this.state.choisirMois});
    }
    
    mois_handler(mois)
    {
        this.setState({mois: mois});
    }

    annee_handler(annee)
    {
        this.setState({annee: annee});
    }



    agenda()
    {
        if (this.state.choisirMois) 
        {
            return(
                <AgendaMois anneeInitiale = {this.state.annee}
                handlers = {this.choixMois_handlers}></AgendaMois>
            );
        } else
        {
            return(
                <AgendaJours moisInitial = {this.state.mois} anneeInitiale = {this.state.annee} 
                handlers = {this.agenda_handlers}></AgendaJours>
            );
        };
        
    }
    render (){
        return(
            <Block style = {styles.block}>
 

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
