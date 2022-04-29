import { Card, Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { useNavigation , NavigationContainer} from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

export default function PageConsulterRdv() {
    return (
        <Block  style = {styles.block}>
            <Block  style = {styles.titre} >
                <Text  style = {styles.TextTitre} h4>Rendez-vous le [date]</Text>
            </Block>
            <Block style = {styles.cardBlock}>
                <Card
                    flex
                    borderless = {false}
                    style={styles.card}
                    title="[Nom][Prenom], [Date de Naissance]"
                    caption="[Type de Vaccin]"
                />
            </Block>
            <Block style = {styles.cardBlock}>
                <Card
                    flex
                    borderless = {false}
                    style={styles.card}
                    title="[Nom][Prenom], [Date de Naissance]"
                    caption="[Type de Vaccin]"
                />
            </Block>
            <Block style = {styles.btnBlock}  >
                <Button round style = {styles.button}   color="primary">Ajouter un RDV</Button>
            </Block>

        </Block>


    );
}
/*

//onPress={() => navigation.navigate('PriseDeRDV')}
*/
const styles = StyleSheet.create({
    block :
        {
            flexDirection: "column",
            marginTop: 50,
            width : 415,
            height : 800 ,
            backgroundColor: "red"

        },
    titre:
        {

            flex: 1,
            textAlign: "center",
            backgroundColor: "yellow" ,

        },
    TextTitre :
        {
            fontWeight: "bold",
            marginTop : 40,
            textAlign: "center",
            backgroundColor: "green" ,
        },
    cardBlock :
        {
            backgroundColor : "blue",
            flex : 1,

        },
    card :
        {
            backgroundColor : "green",
            alignItems : "center",
            height: 100,
            marginLeft : 70,
            marginRight : 70,
            flex : 1,
            marginTop : 7
        },
    btnBlock :
        {
            flex : 1,
            justifyContent: 'space-evenly',
            alignItems: "center",
            marginTop : 3,

},
    button :
        {
            justifyContent: 'space-evenly',
            alignItems: "center",
        }
});