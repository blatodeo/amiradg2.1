import {Component, ViewChild} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {UserService} from './../_services/user.service';
import { ActionSheetController } from '@ionic/angular';
import { AlertController } from '@ionic/angular';
import {Router, ActivatedRoute} from '@angular/router';
import { CustomersPage } from '../customers/customers.page';
import { IonAccordionGroup } from '@ionic/angular';


@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage {
  @ViewChild('accordionGroup', { static: true }) accordionGroup: IonAccordionGroup;


  // Funcion que activa el menu acordeon
  toggleAccordion = () => { 
    const nativeEl = this.accordionGroup;
    if (nativeEl.value === 'second') {
      nativeEl.value = undefined;
    } else {
      nativeEl.value = 'second';
    }
  };

  
  menuType: string = 'overlay';


// Declara los servicios importados
  constructor(private http: HttpClient, private user:UserService, private actionSheetCtrl: ActionSheetController, private alertController: AlertController, private router:Router, private activatedRoute: ActivatedRoute ) {}

  

  datos: any = ''; 

  

  textoBuscar = '';




 //Funcion para consultar los productos de la base de datos
  loadRecipes() {
    this.http.get("http://localhost:8080/AMIRA-DG/consultados.php").subscribe(snap=>{
      console.log(snap); //Muestra los productos por consola
      this.datos=snap;
  
  });
  
  }


//Función que permite recargar la pagina automaticamente para que los cambios se vean reflejados
  ionViewWillEnter(){
    this.loadRecipes();
  }  

  //editar(id:string){
  //}

//Función que se encarga de especificar el item con el que se trabajará por medio del id
  editPost(id:string){
    this.user.setId(id);
  }



  async eliminar(id:string) { //Se encarga de aprobar la eliminacion por medio de una ventana emergente
    const alert = await this.alertController.create({
      header:'Eliminar',
      subHeader:'Eliminar este item',
      message:'¿Estás seguro?',
      buttons: [{
        text: 'OK',
        handler: () =>{
          console.log('Borrando')
          this.http.get("http://localhost:8080/AMIRA-DG/eliminar.php?id="+id).subscribe(snap=>{ //Funcion 'eliminar' traida desde la base de datos hecha en php
            console.log(snap);
            this.loadRecipes();

        });
      
        }
      },'Cancelar']
    })
  await alert.present();

  }

  async eli() { //Función que aprueba el cierre de sesion por medio de una ventana emergente
    const alert = await this.alertController.create({
      header:'Salir',
      subHeader:'Cerrar Sesion',
      message:'¿Estás seguro?',
      buttons: [{
        text: 'OK',
        handler: () =>{
          this.router.navigate(['/login']);

        }
      },'Cancelar']
    })
  await alert.present();

  }


  buscar(event) { //Funcion para buscar items
    console.log(event);
    this.textoBuscar = event.detail.value;
  }

  dataAlbumes(){ //Función para buscar items en la consola
    this.user.getAlbumes().subscribe(datos => {
      console.log(datos);
      this.datos = datos;
    })
  }



}

