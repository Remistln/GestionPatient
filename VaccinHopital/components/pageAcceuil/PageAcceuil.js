import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import PageSansRdv from "../pageSansRdv/PageSansRdv";
import PageAgenda from "../pageAgenda/PageAgenda";
import { useNavigation , NavigationContainer} from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

export default function PageAcceuil({navigation, route}) {
/*
A mettre en place :
-Class pageAcceuil
-Fonction async pr appel api
- algo qui permet de compter le nombre de vaccins dans la table
OU algo qui permet de vérifier si il y a au moin un vaccin
- Afficher le nombre de vaccins dans la pageAcceuil
* */
    return (
      <Block  style = {styles.block}>

            <Block style = {styles.titre} >
              <Text style = {styles.TextTitre} h3>Bonjour {route.params.paramKey}!</Text>
            </Block>

            <Block style = {styles.gererRDV}  >
              <Text style = {styles.centrer}  h4>Gérer les rendez-vous :</Text>
                <Button round style = {styles.button} size="large" color="primary"
                        onPress={() => navigation.navigate('PageAgenda')}
                >Ouvrir l'Agenda</Button>
            </Block>

            <Block style = {styles.sansRDV} >
              <Text  style = {styles.centrer}  h4>[n] Vaccins périment demain :</Text>
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
  