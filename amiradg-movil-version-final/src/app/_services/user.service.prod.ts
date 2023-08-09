import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  codigo_producto:string;

  constructor() { }

  setId(codigo_producto:string){
    this.codigo_producto = codigo_producto;
  }

  getId(){
    return this.codigo_producto;
  }


}
