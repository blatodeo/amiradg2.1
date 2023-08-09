import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FormProdPage } from './form-prod.page';

const routes: Routes = [
  {
    path: '',
    component: FormProdPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FormProdPageRoutingModule {}
