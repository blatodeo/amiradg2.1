import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FormProdPageRoutingModule } from './form-prod-routing.module';

import { FormProdPage } from './form-prod.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FormProdPageRoutingModule
  ],
  declarations: [FormProdPage]
})
export class FormProdPageModule {}
