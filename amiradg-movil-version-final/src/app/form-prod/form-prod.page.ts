import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../_services/user.service';



@Component({
  selector: 'app-form-prod',
  templateUrl: './form-prod.page.html',
  styleUrls: ['./form-prod.page.scss'],
})

export class FormProdPage implements OnInit {
  editing = false;
  id: string;
  datos:any={
  nombre:'',
  categoria:'',
  vencimiento:'',
  existencias:'',
  creador:'',
  imagen:''

}



  constructor(private http:HttpClient, private router:Router, private activatedRoute: ActivatedRoute, private user:UserService) { 
    
  }
  

  ngOnInit() {
    this.activatedRoute.paramMap.subscribe((paramMap)=> {
      if (paramMap.get('itemId')) {
        this.editing = true;
        this.user.getIdProd(paramMap.get('itemId'))
        .subscribe(res => {
          this.datos = res
          console.log(this.datos);
        })
      }
  })

  }

  save_prod(){
    this.http.get("http://localhost:8080/AMIRA-DG/guardar_prod.php?nombre="+this.datos.nombre+"&categoria="+this.datos.categoria+"&vencimiento="+this.datos.vencimiento+"&existencias="+this.datos.existencias+"&creador="+this.datos.creador+"&imagen="+this.datos.imagen).subscribe(snap=>{
      console.log(snap);
      this.router.navigate(['/customers']);

  });
  }

  editar_prod(id:string){
    this.http.get("http://localhost:8080/AMIRA-DG/editar_prod.php?id="+id+"&nombre="+this.datos.nombre+"&categoria="+this.datos.categoria+"&vencimiento="+this.datos.vencimiento+"&existencias="+this.datos.existencias+"&creador="+this.datos.creador+"&imagen="+this.datos.imagen).subscribe(snap=>{
      console.log(snap);
      this.router.navigate(['/customers']);

  });
  }
  



}

  

