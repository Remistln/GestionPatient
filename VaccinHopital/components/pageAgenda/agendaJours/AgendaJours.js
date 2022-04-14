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

            {buttonsPremiereSemaine(3,2022)}

            {buttonsDernièreSemaine(3,2022)}

        </Block>
    );// pour le calendrier : faire une boucle de bouton, les ranger dans une liste, leur attribuer un numéro en fonction du mois
}

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

function buttonsPremiereSemaine(moisNombre, anneeNombre){
    let moisDate = new Date();

    moisDate.setFullYear(anneeNombre, moisNombre, 1);
    let premierJourMois = moisDate.getDay();

    if (premierJourMois == 0)
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

function buttonsDernièreSemaine(moisNombre, anneeNombre){
    let moisDate = new Date();
    moisDate.setFullYear(anneeNombre, moisNombre+1, 0);
    const dernierJourMoisDate = moisDate.getDate();
    let dernierJourMoisSemaine = moisDate.getDay();

    if (dernierJourMoisSemaine == 0)
    {
        dernierJourMoisSemaine = 7;
    }

    //gestion du cas d'un février contenue dans 4 semaines au lieu de 5 semaines
    if (moisNombre == 1 && dernierJourMoisSemaine == 7)
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

function premierLundiMois(moisNombre, anneeNombre)
{
    
}
/* créé une fonction pour une ligne de 7 boutons avec nombre les premiers et correctes chiffre du mois  Fait
créé une fonction pour une ligne de 7 boutons avec nombre croissant depuis un index donnéé Fait
créé une fonction pour une ligne de 7 boutons avec nombre les derniers et correctes chiffre du mois Fait
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
