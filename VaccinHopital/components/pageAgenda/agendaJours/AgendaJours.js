import { Text, Block, Button, Input, Radio, Icon } from 'galio-framework';
import { StyleSheet, View } from "react-native";

export default function AgendaJours() {
    return (
        <Block  style = {styles.block}>
            <Block flex row = {true}>
                <Button onlyIcon icon="left" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff"  style={{ width: 40, height: 40 }}></Button>
                <Text>[mois] [annee]</Text>
                <Button onlyIcon icon="right" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff" style={{ width: 40, height: 40 }}></Button>
            </Block>
            <Block style = {styles.jours} >
                {buttonsSemaine(3)}
            </Block>
            <Block style = {styles.jours} >
                {buttonsSemaine(3)}
            </Block>
            <Block style = {styles.jours} >
                {buttonsSemaine(3)}
            </Block>
        </Block>
    );// pour le calendrier : faire une boucle de bouton, les ranger dans une liste, leur attribuer un numéro en fonction du mois
}

function buttonsSemaine(nombreLundi){
    let nombresSemaine = [];
    for (let index = 0; index < 7; index++) {
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

/* créé une fonction pour une ligne de 7 boutons avec nombre les premiers et correctes chiffre du mois 
créé une fonction pour une ligne de 7 boutons avec nombre croissant depuis un index donnéé Fait
créé une fonction pour une ligne de 7 boutons avec nombre les derniers et correctes chiffre du mois 
créé une fonction qui affiche les 5 lignes */



const styles = StyleSheet.create({

    block :
        {
            flexDirection: "column",
            flex: 1,
            padding: 50,
            justifyContent: 'flex-start',
        },
    
    jours :
        {
            flex: 1,
            justifyContent: 'space-evenly',
            flexDirection: 'row',
        },
    
    jour :
        {
            width: 45,
            height: 45,
        }
   
});
