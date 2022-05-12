import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import PageSansRdv from "../pageSansRdv/PageSansRdv";
import PageAgenda from "../pageAgenda/PageAgenda";
import { useNavigation , NavigationContainer} from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { useEffect, useState } from 'react';


var countEnd = false ; 



export default function PageAcceuil({navigation, route}) {
/*
A mettre en place :
-Class pageAcceuil
-Fonction async pr appel api
- algo qui permet de compter le nombre de vaccins dans la table
OU algo qui permet de vérifier si il y a au moin un vaccin
- Afficher le nombre de vaccins dans la pageAcceuil
* */
const [nbVaccins, setNbVaccins] = useState(0);

useEffect(() => {
  if (countEnd)
    {return}
  var ApiHeaders = new Headers({
    'Content-Type': 'application/ld+json'
  }) 
  
  // ip de l'ordinateur où se trouve le serveur
    //const ip ="192.168.42.96:8000";
    const ip ="172.20.10.9:8000";
  
  //url
  const url = 'http://'+ ip +'/api/vaccins'; 
  
  fetch (url, {method : 'GET', headers : ApiHeaders})
    .then(response => response.json())
    .then (data => 
      {
        var dateAuj = new Date();
        dateAuj.setDate(dateAuj.getDate() + 1);
        let count =0;
        for( const vaccins of data['hydra:member']){
          
          var dateDePeremption = new Date(vaccins.datePeremption)

          if (dateDePeremption.getDate() === dateAuj.getDate() && dateDePeremption.getMonth() === dateAuj.getMonth() && dateDePeremption.getFullYear() === dateAuj.getFullYear()) {
            count = count + 1;
          }
          setNbVaccins(count);
          countEnd =true;
        }
  
    })
  });
//Bonjour {route.params.nom}! si on a le temps, mettre en place ça
    return (
      <Block  style = {styles.block}>

            <Block style = {styles.titre} >
              <Text style = {styles.TextTitre} h3>Bonjour!</Text>
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

const styles = StyleSheet.create({
    block :
        {
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
  