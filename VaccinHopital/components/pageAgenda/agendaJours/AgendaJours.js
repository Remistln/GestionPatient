import { Text, Block, Button, Input, Radio } from 'galio-framework';
import { StyleSheet, View } from "react-native";

export default function AgendaJours() {
    return (
        <Block  style = {styles.block}>
            <Block flex row = {true}>
                <Button onlyIcon icon="left" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff" style={{ width: 40, height: 40 }}></Button>
                <Text>[mois] [annee]</Text>
                <Button onlyIcon icon="right" iconFamily="antdesign" iconSize={30} color="black" iconColor="#fff" style={{ width: 40, height: 40 }}></Button>
            </Block>
        </Block>
    );// pour le calendrier : faire une boucle de bouton, les ranger dans une liste, leur attribuer un numéro en fonction du mois
}

const styles = StyleSheet.create({

    block :
        {
            flexDirection: "column",
            flex: 5,
            padding: 50,
        },
   
});
