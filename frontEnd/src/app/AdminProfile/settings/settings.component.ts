import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-settings',
  templateUrl: './settings.component.html',
  styleUrls: ['./settings.component.css']
})
export class SettingsComponent implements OnInit {
  Nom:String =" Kais Barhoumi";
  Email:String ="Kais@example.com";
  PhoneNumber:Number =1234567890;
  password:String="kais";
  City:String="Kasserine";
  constructor() { }

  ngOnInit(): void {
  }

}
