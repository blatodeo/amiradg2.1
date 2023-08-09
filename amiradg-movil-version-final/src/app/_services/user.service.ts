import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

export interface Dato{
    id?: string;
    nombre:string;
    preparacion:string;
    categoria:string;
    creador:string;
    imagen:string;

  
}


@Injectable({
  providedIn: 'root'
})
export class UserService {

  API = 'http://localhost:8080/AMIRA-DG/consultados.php'
  API1 = 'http://localhost:8080/AMIRA-DG/consultados_prod.php'
  id: string;

  constructor(private http:HttpClient) { }

  public getIdRecipes(id:string){
    return this.http.get<Dato>("http://localhost:8080/AMIRA-DG/consulta_id.php?id="+id)
  }

  getIdProd(id:string){
    return this.http.get<Dato>("http://localhost:8080/AMIRA-DG/consulta_id_prod.php?id="+id)
  }

  setId(id:string) { 
    this.id=id;
  }

  getId() {
    return this.id
  }




  update(id:string, datos:Dato){
    return this.http.put<Dato>("http://localhost:8080/AMIRA-DG/consulta_id.php?id="+id, datos);

  }


  

  getMenuOptss() { return this.http.get('/assets/data/menu.json'); 

} 
  


getAlbumes() { return this.http.get<any[]>('https://jsonplaceholder.typicode.com/albums'); } 
  


}


