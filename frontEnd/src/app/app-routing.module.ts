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
  { path: 'entCata' , component: EntCataComponent}


];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }