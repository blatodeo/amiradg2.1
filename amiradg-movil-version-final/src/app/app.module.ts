import { NgModule } from '@angular/core'; //Nos permite llamar los datos a formularios, (útil para función editar)
import { BrowserModule } from '@angular/platform-browser';//Libreria por defecto, incluida al implementar ionic
import { RouteReuseStrategy } from '@angular/router';//Librerias por defecto, al implementar ionic


import { IonicModule, IonicRouteStrategy } from '@ionic/angular';
import { SplashScreen } from '@awesome-cordova-plugins/splash-screen/ngx';
import {StatusBar} from  '@awesome-cordova-plugins/status-bar/ngx';

import { AppComponent } from './app.component'; //Nos permite declarar el nombre de las rutas, asi como su URL e icono.
import { AppRoutingModule } from './app-routing.module'; //Con este servicio nos aseguramos de enrutar correctamente las paginas de la aplicación
import {HttpClientModule } from '@angular/common/http'; //Se necesita para llamar items desde una direccion 'http'
import { PipesModule } from './pipes/pipes.module'; //Es útil para implementar un searchbar

//Librerias necesarias para desarrollar la aplicación correctamente


@NgModule({
  declarations: [AppComponent],
  entryComponents:[],
  imports: [BrowserModule, IonicModule.forRoot(), AppRoutingModule, HttpClientModule, PipesModule, ],
  providers: [
    StatusBar,
    SplashScreen,
    { provide: RouteReuseStrategy, useClass: IonicRouteStrategy }],
  bootstrap: [AppComponent],
})
export class AppModule {}
