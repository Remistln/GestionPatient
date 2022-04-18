import {Text, Block, Button, Icon } from 'galio-framework';
import { StyleSheet } from "react-native";
import React, { useState } from 'react';

export default function AgendaMois() {
    let anneeInitiale = 2022;
    
    const [annee, setAnnee] = useState(anneeInitiale);

    return(
        <Block style = {styles.block}>
            <Block style = {styles.entete}>
                <Button 
                        onlyIcon icon="left" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff"  style={{ width: 40, height: 40 }}
                        onPress= {() => {
                            setAnnee(annee - 1);
                        }}
                        ></Button>
                    <Text h4>{annee}</Text>
                    <Button 
                        onlyIcon icon="right" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff" style={{ width: 40, height: 40 }}
                        onPress= {() => {
                            setAnnee(annee + 1);
                        }}
                    ></Button>
            </Block>
            <Block style = {styles.agenda}>
                {calendrier(annee)}
            </Block>
        </Block>
    );
};


function calendrier(annee)
{
    const moisListe = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    let nombre = 0;
    let buttonsListe=moisListe.map((mois)=>{
        nombre += 1;
        return (
        <Button style = {styles.jour} color="info" key={nombre}>
            <Text color="white">{mois}</Text>
        </Button>)
      });
    return buttonsListe;
};



const styles = StyleSheet.create({

    block :
    {
        flexDirection: "column",
        flex: 1,
        justifyContent: 'flex-start',
            
        borderColor: "black",
        borderWidth: 5,
        padding:15,
    },

    agenda: 
    {
        flex: 4,
    },
    
    entete: 
    {
        flex: 1,
        flexDirection: "row",
        justifyContent: "center",
        alignItems:"center",
        borderColor: "black",
        borderWidth: 4,

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

});