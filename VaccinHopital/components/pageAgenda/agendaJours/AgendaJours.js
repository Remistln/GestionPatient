import { Text, Block, Button, Icon } from 'galio-framework';
import { StyleSheet } from "react-native";
import React, { useState } from 'react';

export default function AgendaJours(props) {



    const [mois, setMois] = useState(props.moisInitial);
    const [annee, setAnnee] = useState(props.anneeInitiale);


    const moisListe = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    return (
        <Block  style = {styles.block}>
            <Block style = {styles.entete}>
                <Button 
                    onlyIcon icon="left" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff"  style={{ width: 40, height: 40 }}
                    onPress= {() => {
                        if (mois != 0)
                        {
                            setMois( mois - 1);
                        } else 
                        {
                            setMois(11);
                            setAnnee(annee - 1);
                        }
                    }}
                    ></Button>
                <Text h4 onPress= {props.handlers.choixDuMois_handler}>{moisListe[mois]} {annee}</Text>
                <Button 
                    onlyIcon icon="right" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff" style={{ width: 40, height: 40 }}
                    onPress= {() => {
                        if (mois != 11)
                        {
                            setMois( mois + 1);
                        } else 
                        {
                            setMois(0);
                            setAnnee(annee + 1);
                        }
                    }}
                    ></Button>
            </Block>
            
            <Block style = {styles.agenda}>
                {agenda(mois,annee)}
            </Block>
            
        </Block>
    );
}

// affiche une partie de ligne de boutons avec des jours croissants
// ajouter ici le handler des boutons
function buttonsSemaine(nombreLundi, nombreJours){
    let nombresSemaine = [];
    for (let index = 0; index < nombreJours; index++) {
        nombresSemaine.push(nombreLundi + index);
    };
    let buttonsListe=nombresSemaine.map((nombre)=>{
        return (
        <Button style = {styles.jour} color="info" round key={nombre}>
            <Text color="white">{nombre.toString()}</Text>
        </Button>)
      });
    return buttonsListe;
}

// affiche la ligne de la première semaine
function buttonsPremiereSemaine(moisNombre, anneeNombre){
    let moisDate = new Date();

    moisDate.setFullYear(anneeNombre, moisNombre, 1);
    let premierJourMois = moisDate.getDay();

    if (premierJourMois === 0)
    {
        premierJourMois = 7;
    }
    
    moisDate.setFullYear(anneeNombre, moisNombre, 0);
    const dernierJourMois = moisDate.getDate() - premierJourMois +2;

    return (
        <Block style = {styles.jours}>
            {buttonsSemaine(dernierJourMois,premierJourMois-1)}
            {buttonsSemaine(1,8-premierJourMois)}
        </Block>
    )
}

// affiche la ligne de la dernière semaine
function buttonsDernièreSemaine(moisNombre, anneeNombre){
    let moisDate = new Date();
    moisDate.setFullYear(anneeNombre, moisNombre+1, 0);
    const dernierJourMoisDate = moisDate.getDate();
    let dernierJourMoisSemaine = moisDate.getDay();

    if (dernierJourMoisSemaine === 0)
    {
        dernierJourMoisSemaine = 7;
    }

    //gestion du cas d'un février contenue dans 4 semaines au lieu de 5 semaines
    if (moisNombre === 1 && dernierJourMoisSemaine === 7)
    {
        return (
            <Block style = {styles.jours}>
            {buttonsSemaine(1,7)}
            </Block>
        )
    };

    return (
        <Block style = {styles.jours}>
            {buttonsSemaine(dernierJourMoisDate - dernierJourMoisSemaine + 1,dernierJourMoisSemaine)}
            {buttonsSemaine(1,7-dernierJourMoisSemaine)}
        </Block>
    )

}

// donne la date du premier lundi d'un mois
function premierLundiMois(moisNombre, anneeNombre)
{
    let moisDate = new Date();

    moisDate.setFullYear(anneeNombre, moisNombre, 1);
    let premierJourMois = moisDate.getDay();
    if (premierJourMois === 1)
    {
        return 8;
    }
    if (premierJourMois === 0)
    {
        return 2;
    }
    return 9 - premierJourMois;
}

function legendeSemaine()
{
    return(
        <Block style = {styles.jours}>
            <Text h3 style = {styles.legende}>L</Text>
            <Text h3 style = {styles.legende}>M</Text>
            <Text h3 style = {styles.legende}>M</Text>
            <Text h3 style = {styles.legende}>J</Text>
            <Text h3 style = {styles.legende}>V</Text>
            <Text h3 style = {styles.legende}>S</Text>
            <Text h3 style = {styles.legende}>D</Text>
        </Block>
    )
}

// affiche l'agenda complet d'un mois
function agenda(moisNombre, anneeNombre)
{
    let lundi = premierLundiMois(moisNombre, anneeNombre);

    let moisDate = new Date();
    moisDate.setFullYear(anneeNombre, moisNombre+1, 0);
    const dernierJourMoisDate = moisDate.getDate();

    if ( moisNombre != 1){
        if ( lundi === 2 || (lundi === 3 && dernierJourMoisDate === 31 ) )
        {
            return (
                <>
                {legendeSemaine()}
    
                {buttonsPremiereSemaine(moisNombre,anneeNombre)}
    
                <Block style = {styles.jours}>
                    {buttonsSemaine(lundi,7)}
                </Block>
                <Block style = {styles.jours}>
                    {buttonsSemaine(lundi + 7,7)}
                </Block>
                <Block style = {styles.jours}>
                    {buttonsSemaine(lundi + 14,7)}
                </Block>
                <Block style = {styles.jours}>
                    {buttonsSemaine(lundi + 21,7)}
                </Block>
    
                {buttonsDernièreSemaine(moisNombre,anneeNombre)}
                </>
            )
        }
        lundi = premierLundiMois(moisNombre + 1, anneeNombre);
        return (
            <>
            {legendeSemaine()}

            {buttonsPremiereSemaine(moisNombre,anneeNombre)}

            <Block style = {styles.jours}>
                {buttonsSemaine(lundi,7)}
            </Block>
            <Block style = {styles.jours}>
                {buttonsSemaine(lundi + 7,7)}
            </Block>
            <Block style = {styles.jours}>
                {buttonsSemaine(lundi + 14,7)}
            </Block>

            {buttonsDernièreSemaine(moisNombre,anneeNombre)}

            <Block style = {styles.jours}>
                {buttonsSemaine(lundi,7)}
            </Block>
            </>
        )
    }
    return (
        <>
        {legendeSemaine()}

        {buttonsPremiereSemaine(moisNombre,anneeNombre)}

        <Block style = {styles.jours}>
            {buttonsSemaine(lundi,7)}
        </Block>
        <Block style = {styles.jours}>
            {buttonsSemaine(lundi + 7,7)}
        </Block>
        <Block style = {styles.jours}>
            {buttonsSemaine(lundi + 14,7)}
        </Block>

        {buttonsDernièreSemaine(moisNombre,anneeNombre)}
        </>
    )
    
}


const styles = StyleSheet.create({

    block :
    {
        flexDirection: "column",
        flex: 1,
        justifyContent: 'flex-start',
        borderColor: "black",
        borderWidth: 5,
        padding:15,
        backgroundColor : "red"
    },

    agenda: 
    {
        flex: 4,
        backgroundColor : "green"
    },
    
    entete: 
    {
        flex: 1,
        flexDirection: "row",
        justifyContent: "center",
        alignItems:"center",
        borderColor: "black",
        borderWidth: 4,
        backgroundColor : "yellow"

    },
    
    jours :
    {
        flex: 1,
        justifyContent: 'space-evenly',
        flexDirection: 'row',
        alignItems:"center",

    },
    
    jour :
    {
        width: 45,
        height: 45,
    },

    legende :
    {
        marginHorizontal: 22.5,
    },

});
