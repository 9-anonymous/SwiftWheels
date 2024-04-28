import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainPageComponent } from './MainPage/main-page/main-page.component';
import { SignupComponent } from './signup/signup.component';
import { LoginComponent } from './login/login.component';
import { NewsComponent } from './news/news.component';
import { EmailComponent } from './email/email.component';
import { ContactInputComponent } from './contact/contact-input/contact-input.component';
import { ContactListComponent } from './contact/contact-list/contact-list.component';
import { ContactMessageComponent } from './contact/contact-message/contact-message.component';
import { NotificationListComponent } from './notification/notification-list/notification-list.component';
import { MainSearchComponent } from './Searchs/mainSearch/main-search/main-search.component';
import { PostCarComponent } from './PostCar/post-car/post-car.component';
import { EntCataComponent } from './ent-cata/ent-cata.component';
import { UserProfileComponent } from './user-profile/user-profile.component';




import { AccueilComponent } from './accueil/accueil.component';
import { VenteComponent } from './vente/vente.component';
import { ClientComponent } from './client/client.component';
import { VoitureComponent } from './voiture/voiture.component';
import { ProfileComponent } from './AdminProfile/profile/profile.component';
import { SettingsComponent } from './AdminProfile/settings/settings.component';
import { PanierComponent } from './panier/panier.component';
 import { ReceiptComponent } from './receipt/receipt.component';


const routes: Routes = [
  { path: '' , component : MainPageComponent},
  { path: 'register', component: SignupComponent },
  { path: 'login', component: LoginComponent },
  { path: 'news', component: NewsComponent },
  { path: 'email', component: EmailComponent },
  { path: 'contactinput', component: ContactInputComponent },
  { path: 'contactlist', component: ContactListComponent },
  { path: 'contact-message/:id', component: ContactMessageComponent },
  { path: 'searchs' , component : MainSearchComponent },
  { path: 'AddCar' , component : PostCarComponent },
  { path: 'notifications', component: NotificationListComponent },
  { path: 'entCata' , component: EntCataComponent},


  { path: 'news/:mark', component: NewsComponent },



  { path: 'admin', component: AccueilComponent },
  { path: 'clients', component: ClientComponent },
  { path: 'voitures', component: VoitureComponent },
  { path: 'ventes', component: VenteComponent },
  {path:'profile', component:ProfileComponent},
  {path:'settings', component:SettingsComponent},

  {path:'userprofile', component:UserProfileComponent},

  {path:'panier', component:PanierComponent},
  {path:'receipt', component:ReceiptComponent}

];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
