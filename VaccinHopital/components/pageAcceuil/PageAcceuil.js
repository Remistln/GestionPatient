import { Text, Block, Button } from 'galio-framework';
import { StyleSheet } from 'react-native';

export default function PageAcceuil() {
  return (
    <Block flex row width={'90%'} style ={styles.millieu}>
        
        <Block flex row = {false} >
            <Block flex = {2}></Block>
            <Block flex = {1}>
              <Text h2>Bonjour !</Text>
            </Block>
            <Block flex = {2}></Block>
            <Block flex = {3} middle   >
              <Text h4>Gérer les rendez-vous :</Text>
              <Button size= 'large' >Ouvrir l'Agenda</Button>
            </Block>
            <Block flex = {3} middle >
              <Text h4>[nombre] Vaccins périment demain :</Text>
              <Button size= 'large'>Vacciner sans rendez-vous</Button>
            </Block>
            <Block flex = {3} ></Block>
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
  