import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';

export default function PageAcceuil() {
  return (
    <Block flex row>
        
        <Block flex row = {false}>

            <Text h2>Bonjour !</Text>
            <Text h3>Gérer les rendez-vous :</Text>
            <Button>Ouvrir l'Agenda</Button>
            <Text h3>Vaccins prériment demain :</Text>
            <Button>Vacciner sans rendez-vous</Button>

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
  