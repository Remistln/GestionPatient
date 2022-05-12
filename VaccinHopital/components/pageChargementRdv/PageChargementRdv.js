import React from 'react';
import {Block} from 'galio-framework';
import {ActivityIndicator, StyleSheet } from 'react-native';

export default function PageChargementRdv({navigation, route})
{
    async function getVaccinListe()
    {
        var ApiHeaders = new Headers({
            'Content-Type': 'application/ld+json'
        });

        // ip de l'ordinateur où se trouve le serveur
        const ip ="192.168.42.96:8000";

        const url = 'http://' + ip + '/api/vaccins';
        await fetch(url, { method: 'GET', headers: ApiHeaders,}) 
        .then(response => response.json())
        .then((data) => {
            let vaccinListe = []
            for (const vaccin of data['hydra:member'])
            {
                vaccinListe.push(vaccin);
                
            };
            return vaccinListe;
            })
        .then( vaccinListe => 
            {
                //route.params reccupérer la date
                const jour= 5;
                const mois= 1;
                const annee= 2022;
                navigation.navigate('PagePriseRdv', {vaccinListe: vaccinListe, jour: jour, mois: mois, annee: annee });
            });
    };

    getVaccinListe();

    return(
        <Block  style = {styles.block}>
            <ActivityIndicator />
        </Block>
    )
};



const styles = StyleSheet.create({
    block :
        {
            flexDirection: "column",
            flex: 1,
            padding: 50,

        },

  });