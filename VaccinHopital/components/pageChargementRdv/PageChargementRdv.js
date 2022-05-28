import React from 'react';
import {Block} from 'galio-framework';
import {ActivityIndicator, StyleSheet } from 'react-native';

export default function PageChargementRdv({navigation, route})
{
    //route.params reccupérer la date de consulter
    const annee = route.params.annee;
    const mois = route.params.mois;
    const jour = route.params.jour ;
    const dateChoisie = route.params.choosenDate;

    async function getVaccinListe()
    {
        var ApiHeaders = new Headers({
            'Content-Type': 'application/ld+json'
        });

        // ip de l'ordinateur où se trouve le serveur
        //const ip ="192.168.42.96:8000";
        const ip ="172.20.10.9:8000"; //ip aya

        const url = 'http://' + ip + '/api/vaccins';
        await fetch(url, { method: 'GET', headers: ApiHeaders,}) 
        .then(response => response.json())
        .then((data) => {
            let vaccinListe = []
            for (const vaccin of data['hydra:member'])
            {
                if (! vaccin.reserve )
                {
                    vaccinListe.push(vaccin);

                }
            };
            return vaccinListe;
            })
        .then( vaccinListe => 
            {

                const jour= jour;
                const mois= mois;
                const annee= annee;
                navigation.navigate('PagePriseRdv', {choisieDate: dateChoisie, vaccinListe: vaccinListe, jour: jour, mois: mois, annee: annee });
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