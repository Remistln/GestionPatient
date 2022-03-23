import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';

export default function PageLogin() {
  return (
      <Block  style = {styles.block}>
        <Block flex row = {false}>

            <Block  style = {styles.titre} >
                <Text  style = {styles.TextTitre} h2>Login</Text>
            </Block>
            <Block  style = {styles.nom}>
                <Text h4>Nom : </Text>
                <Input ></Input>
            </Block>

            <Block  style = {styles.mdp}>
            <Text h4>Mot de Passe : </Text>
                <Input  secureTextEntry={true}></Input>
            </Block>

            <Block  style = {styles.connexion} >
                <Button bottom>Connexion</Button>
            </Block>
        </Block>
    </Block>
  );
}

const styles = StyleSheet.create({

    block :
        {
            flexDirection: "column",
            flex: 5,
            padding : 50
        },
    titre: {
        justifyContent: 'space-evenly',
        flex: 2,
        textAlign: "center",
        fontWeight : 'bold',
    },
    TextTitre : {
        fontWeight: "bold",
        textAlign: "center",
    },
    nom: {
        flex: 2,
        justifyContent: 'space-evenly',

    },
    mdp: {
        flex: 2,
        justifyContent: 'space-evenly',
    },
    connexion : {
        flex : 2,
        marginBottom : 10,
        justifyContent: 'space-evenly',
        alignItems:'center',
    }
  });
  

var sel = "protectMè4Mù"

