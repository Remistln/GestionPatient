import { Text, Block, Button, Input, Radio } from 'galio-framework';
import { StyleSheet } from "react-native";
import MyDatePicker from "../datePicker/DatePicker";

export default function PageSansRdv() {
    return (
        <Block  style = {styles.block}>
            <Block flex row = {false}>

                <Block  style = {styles.titre} >
                    <Text  style = {styles.TextTitre} h4>Vaccins sans rendez-vous</Text>
                </Block>

                <Block  style = {styles.date}>
                    <Text h5>Date de Naissance : </Text>
                    <MyDatePicker></MyDatePicker>
                </Block>

                <Block  style = {styles.vaccins}>
                    <Text h5>Vaccins : </Text>
                    <Radio label="Pfizer" color="primary"  />
                    <Radio label="Moderna" color="primary"  />
                </Block>
            </Block>

                <Block style = {styles.valider} >
                    <Button >Valider</Button>
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
        textAlign: "center",
        marginTop: 3,
        fontWeight : 'bold'
    },
    TextTitre : {
        fontWeight: "bold",
        textAlign: "center"
    },
    date: {
        flex: 2,
        justifyContent: 'space-evenly'

    },
    vaccins: {
        flex: 2,
        justifyContent: 'space-evenly',
        marginTop : 40
    },
    valider : {
        flex : 1,
        marginBottom : 10,
        justifyContent: 'space-evenly',
        alignItems:'center',
    }
});
