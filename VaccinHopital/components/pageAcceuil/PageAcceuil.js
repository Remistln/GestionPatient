import { Text, Block, Button } from 'galio-framework';
import { StyleSheet, Alert } from 'react-native';
import PageSansRdv from "../pageSansRdv/PageSansRdv";
import PageAgenda from "../pageAgenda/PageAgenda";
import { useNavigation , NavigationContainer} from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { useEffect, useState } from 'react';

// Variable vérifiant que le compte n'est effectuée qu'une seule fois
var countEnd = false ;


// Page d'acceuil, elle affiche le nombre de vaccins qui périme demain ainsi que deux boutons
// Un bouton permet l'accès à l'agenda
// Un bouton permet l'accès à la page des vaccins sans Rendez-vous
export default function PageAcceuil({navigation, route}) {

const [nbVaccins, setNbVaccins] = useState(0);

useEffect(() => {
  // Test vérifiant que le compte n'est effectuée qu'une seule fois
  if (countEnd)
    {return}

  // Préparation de l'appel API des vaccins
  var ApiHeaders = new Headers({
    'Content-Type': 'application/ld+json'
  })

  // ip de l'ordinateur où se trouve le serveur
  //const ip ="172.20.10.9:8000"; //ip aya
  //const ip ="172.20.10.4:8000"; //ip aya

  //url
  const url = 'http://'+ ip +'/api/vaccins';

  // Appel API des vaccins
  fetch (url, {method : 'GET', headers : ApiHeaders})
    .then(response => response.json())
    // Décompte des vaccins qui périment demain et alerte en cas de stock bas : moins de 20 vaccins disponibles
    .then (data =>
      {
        var dateAuj = new Date();
        dateAuj.setDate(dateAuj.getDate() + 1);
        let countSansRdv =0;
        let countVaccin =0;
        for( const vaccins of data['hydra:member']){

          var dateDePeremption = new Date(vaccins.datePeremption)

          if (dateDePeremption.getDate() === dateAuj.getDate() && dateDePeremption.getMonth() === dateAuj.getMonth() && dateDePeremption.getFullYear() === dateAuj.getFullYear()) {
            countSansRdv = countSansRdv + 1;
          }
          setNbVaccins(countSansRdv);

          if (dateAuj < dateDePeremption && ! vaccins.reserve)
          {countVaccin = countVaccin + 1;};

          countEnd =true;
        }
        if (countVaccin < 20)
        {
          Alert.alert(
            "Alerte Stock",
            "Le Stock des vaccins est bas : moins de vingt vaccins disponibles",
            [
              { text: "OK"}
            ]
          );
        }
    })
  });

  //Affichage
    return (
      <Block  style = {styles.block}>

            <Block style = {styles.titre} >
              <Text style = {styles.TextTitre} h3>Bonjour {route.parms.nom}!</Text>
            </Block>

            <Block style = {styles.gererRDV}  >
              <Text style = {styles.centrer}  h4>Gérer les rendez-vous :</Text>
                <Button round style = {styles.button} size="large" color="primary"
                        onPress={() => navigation.navigate('AgendaVaccinations')}
                >Ouvrir l'Agenda</Button>
            </Block>

            <Block style = {styles.sansRDV} >
              <Text  style = {styles.centrer}  h4>{nbVaccins} Vaccins périment demain :</Text>
                <Button round  style = {styles.button}  size="large" color="primary"
                        onPress={() => navigation.navigate('PageSansRdv')}>Vacciner sans rendez-vous</Button>
            </Block>

    </Block>
  );
}
// Style de l'affichage
const styles = StyleSheet.create({
    block : {
        flexDirection: "column",
        flex: 5,
        padding: 50,
    },
    titre: {
        justifyContent: 'space-evenly',
        flex: 3,
        textAlign: "left",
    },
    TextTitre : {
        marginTop : 10,
        fontWeight: "bold",
        textAlign: "left",
    },
    gererRDV : {
        flex: 2,
        alignItems: 'center',
    },
    sansRDV : {
        flex: 4,
        alignItems: 'center',

    },
    centrer : {
        textAlign: "center",
    },
    button : {
        marginTop : '7%',
    }
  });
  