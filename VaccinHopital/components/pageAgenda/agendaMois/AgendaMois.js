import {Text, Block, Button, Icon } from 'galio-framework';
import { StyleSheet } from "react-native";
import React, { useState } from 'react';

export default function AgendaMois(props) {
    
    const [annee, setAnnee] = useState(props.anneeInitiale);

    const moisListe1 = ["Janvier", "Février", "Mars"];
    const moisListe2 = [ "Avril", "Mai", "Juin"];
    const moisListe3 = [ "Juillet", "Août", "Septembre"];
    const moisListe4 = [ "Octobre", "Novembre", "Décembre"];

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
            <Block style = {styles.calendrier}>
                <Block style = {styles.troisMois}>
                    {calendrier(annee, moisListe1,0)}
                </Block>
                <Block style = {styles.troisMois}>
                    {calendrier(annee, moisListe2,3)}
                </Block>
                <Block style = {styles.troisMois}>
                    {calendrier(annee, moisListe3,6)}
                </Block>
                <Block style = {styles.troisMois}>
                    {calendrier(annee, moisListe4,9)}
                </Block>
            </Block>
        </Block>
    );
};


function calendrier(annee, moisListe, nombre)
{

    let buttonsListe=moisListe.map((mois)=>{
        nombre += 1;
        return (
        <Button style = {styles.mois} color="info" key={nombre}>
            <Text color="white" h6>{mois}</Text>
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

    calendrier: 
    {
        flex: 4,
        justifyContent: "space-around",
    },
    
    entete: 
    {
        flex: 1,
        flexDirection: "row",
        justifyContent: "space-evenly",
        alignItems:"center",
        borderColor: "black",
        borderWidth: 4,

    },
    
    troisMois :
    {
        flex: 1,
        justifyContent: 'space-evenly',
        flexDirection: 'row',
        alignItems:"center",
    },
    
    mois :
    {
        width: 95,
        height: 50,
    },

});