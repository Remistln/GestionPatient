import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';

export default function PageLogin() {
  return (
    <Block flex row>
        <Block flex row = {false}>
            <Block flex ></Block>
            <Block center flex = {2} shadow shadowColor="red">
                <Text h2>Login</Text>
            </Block>
            <Block left middle flex = {2} width="75%" style ={styles.millieu}>
                <Text h3 >Nom</Text>
                <Input></Input>
                <Text h3>Mots de Passe</Text>
                <Input></Input>
            </Block>
            <Block flex></Block>
            <Block bottom flex  left >
                <Button bottom>Connexion</Button>
            </Block>
        </Block>
    </Block>
  );
}

const styles = StyleSheet.create({
    millieu: {
        /*
        borderColor: "blue",
        borderWidth: 2,
        */
        alignSelf: 'center',
    },
  });
  