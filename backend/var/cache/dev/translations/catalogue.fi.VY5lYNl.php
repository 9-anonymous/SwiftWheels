<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('fi', array (
  'validators' => 
  array (
    'This value should be false.' => 'Arvon tulee olla epätosi.',
    'This value should be true.' => 'Arvon tulee olla tosi.',
    'This value should be of type {{ type }}.' => 'Arvon tulee olla tyyppiä {{ type }}.',
    'This value should be blank.' => 'Arvon tulee olla tyhjä.',
    'The value you selected is not a valid choice.' => 'Arvon tulee olla yksi annetuista vaihtoehdoista.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Sinun tulee valita vähintään yksi vaihtoehto.|Sinun tulee valita vähintään {{ limit }} vaihtoehtoa.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Sinun tulee valita enintään yksi vaihtoehto.|Sinun tulee valita enintään {{ limit }} vaihtoehtoa.',
    'One or more of the given values is invalid.' => 'Yksi tai useampi annetuista arvoista on virheellinen.',
    'This field was not expected.' => 'Tätä kenttää ei odotettu.',
    'This field is missing.' => 'Tämä kenttä puuttuu.',
    'This value is not a valid date.' => 'Annettu arvo ei ole kelvollinen päivämäärä.',
    'This value is not a valid datetime.' => 'Annettu arvo ei ole kelvollinen päivämäärä ja kellonaika.',
    'This value is not a valid email address.' => 'Annettu arvo ei ole kelvollinen sähköpostiosoite.',
    'The file could not be found.' => 'Tiedostoa ei löydy.',
    'The file is not readable.' => 'Tiedostoa ei voi lukea.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Tiedostonkoko ({{ size }} {{ suffix }}) on liian iso. Suurin sallittu tiedostonkoko on {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Tiedostotyyppi ({{ type }}) on virheellinen. Sallittuja tiedostotyyppejä ovat {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Arvon tulee olla {{ limit }} tai vähemmän.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Liian pitkä syöte. Syöte saa olla enintään yhden merkin.|Liian pitkä syöte. Syöte saa olla enintään {{ limit }} merkkiä.',
    'This value should be {{ limit }} or more.' => 'Arvon tulee olla {{ limit }} tai enemmän.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Liian lyhyt syöte. Syötteen tulee olla vähintään yhden merkin.|Liian lyhyt syöte. Syötteen tulee olla vähintään {{ limit }} merkkiä.',
    'This value should not be blank.' => 'Kenttä ei voi olla tyhjä.',
    'This value should not be null.' => 'Annettu arvo ei voi olla null.',
    'This value should be null.' => 'Annetun arvon tulee olla null.',
    'This value is not valid.' => 'Virheellinen arvo.',
    'This value is not a valid time.' => 'Annettu arvo ei ole kelvollinen kellonaika.',
    'This value is not a valid URL.' => 'Annettu arvo ei ole kelvollinen URL-osoite.',
    'The two values should be equal.' => 'Kahden annetun arvon tulee olla samat.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Annettu tiedosto on liian iso. Suurin sallittu tiedostokoko on {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Tiedosto on liian iso.',
    'The file could not be uploaded.' => 'Tiedoston siirto epäonnistui.',
    'This value should be a valid number.' => 'Arvon tulee olla numero.',
    'This file is not a valid image.' => 'Tiedosto ei ole kelvollinen kuva.',
    'This is not a valid IP address.' => 'Tämä arvo ei ole kelvollinen IP-osoite.',
    'This value is not a valid language.' => 'Arvo ei ole kelvollinen kieli.',
    'This value is not a valid locale.' => 'Arvo ei ole kelvollinen kieli- ja alueasetus (locale).',
    'This value is not a valid country.' => 'Arvo ei ole kelvollinen maa.',
    'This value is already used.' => 'Arvo on jo käytetty.',
    'The size of the image could not be detected.' => 'Kuvan kokoa ei tunnistettu.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Kuva on liian leveä ({{ width }} px). Leveyden tulee olla enintään {{ max_width }} px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Kuva on liian kapea ({{ width }} px). Leveyden tulee olla vähintään {{ min_width }} px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'Kuva on liian korkea ({{ width }} px). Korkeuden tulee olla enintään {{ max_width }} px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Kuva on liian matala ({{ height }} px). Korkeuden tulee olla vähintään {{ min_height }} px.',
    'This value should be the user\'s current password.' => 'Arvon tulee olla käyttäjän tämänhetkinen salasana.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Arvon tulee olla tasan yhden merkin pituinen.|Arvon tulee olla tasan {{ limit }} merkin pituinen.',
    'The file was only partially uploaded.' => 'Tiedosto ladattiin vain osittain.',
    'No file was uploaded.' => 'Tiedostoa ei ladattu.',
    'No temporary folder was configured in php.ini.' => 'Väliaikaista kansiota ei ole määritetty php.ini:ssä, tai määritetty kansio ei ole olemassa.',
    'Cannot write temporary file to disk.' => 'Väliaikaistiedostoa ei voitu kirjoittaa levylle.',
    'A PHP extension caused the upload to fail.' => 'PHP-laajennoksen vuoksi tiedoston lataus epäonnistui.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Tässä ryhmässä tulee olla vähintään yksi elementti.|Tässä ryhmässä tulee olla vähintään {{ limit }} elementtiä.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Tässä ryhmässä tulee olla enintään yksi elementti.|Tässä ryhmässä tulee olla enintään {{ limit }} elementtiä.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Tässä ryhmässä tulee olla tasan yksi elementti.|Tässä ryhmässä tulee olla tasan {{ limit }} elementtiä.',
    'Invalid card number.' => 'Virheellinen korttinumero.',
    'Unsupported card type or invalid card number.' => 'Tätä korttityyppiä ei tueta tai korttinumero on virheellinen.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Tämä arvo ei ole kelvollinen kansainvälinen pankkitilinumero (IBAN).',
    'This value is not a valid ISBN-10.' => 'Arvo ei ole kelvollinen ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Arvo ei ole kelvollinen ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Arvo ei ole kelvollinen ISBN-10 eikä ISBN-13.',
    'This value is not a valid ISSN.' => 'Arvo ei ole kelvollinen ISSN.',
    'This value is not a valid currency.' => 'Arvo ei ole kelvollinen valuutta.',
    'This value should be equal to {{ compared_value }}.' => 'Arvo ei ole sama kuin {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Arvon tulee olla suurempi kuin {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Arvon tulee olla suurempi tai yhtä suuri kuin {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Arvon tulee olla sama kuin {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Arvon tulee olla pienempi kuin {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Arvon tulee olla pienempi tai yhtä suuri kuin {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Arvon ei tule olla sama kuin {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Arvon ei tule olla sama kuin {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Kuvasuhde on liian suuri ({{ ratio }}). Suurin sallittu suhde on {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Kuvasuhde on liian pieni ({{ ratio }}). Pienin sallittu suhde on {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Kuva on neliö ({{ width }}x{{ height }} px). Neliönmuotoiset kuvat eivät ole sallittuja.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Kuva on vaakasuuntainen ({{ width }}x{{ height }} px). Vaakasuuntaiset kuvat eivät ole sallittuja.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Kuva on pystysuuntainen ({{ width }}x{{ height }} px). Pystysuuntaiset kuvat eivät ole sallittuja.',
    'An empty file is not allowed.' => 'Tiedosto ei saa olla tyhjä.',
    'The host could not be resolved.' => 'Palvelimeen ei saatu yhteyttä.',
    'This value does not match the expected {{ charset }} charset.' => 'Arvo ei vastaa odotettua merkistöä {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'Tämä arvo ei ole kelvollinen liiketoiminnan tunnistekoodi (BIC).',
    'Error' => 'Virhe',
    'This is not a valid UUID.' => 'Tämä arvo ei ole kelvollinen UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'Tämän arvon tulee olla luvun {{ compared_value }} kerrannainen.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'Tätä yritystunnusta (BIC) ei ole liitetty IBAN-tilinumeroon {{ iban }}.',
    'This value should be valid JSON.' => 'Arvon tulee olla kelvollinen JSON.',
    'This collection should contain only unique elements.' => 'Ryhmän tulee sisältää vain yksilöllisiä arvoja.',
    'This value should be positive.' => 'Arvon tulee olla positiivinen.',
    'This value should be either positive or zero.' => 'Arvon tulee olla joko positiivinen tai nolla.',
    'This value should be negative.' => 'Arvon tulee olla negatiivinen.',
    'This value should be either negative or zero.' => 'Arvon tulee olla joko negatiivinen tai nolla.',
    'This value is not a valid timezone.' => 'Arvo ei ole kelvollinen aikavyöhyke.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'Tämä salasana on vuotanut tietomurrossa, eikä sitä saa käyttää. Käytä toista salasanaa.',
    'This value should be between {{ min }} and {{ max }}.' => 'Arvon tulee olla {{ min }} - {{ max }}.',
    'This value is not a valid hostname.' => 'Arvo ei ole kelvollinen laitenimi (hostname).',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'Ryhmässä olevien elementtien määrän pitää olla luvun {{ compared_value }} kerrannainen.',
    'This value should satisfy at least one of the following constraints:' => 'Arvon tulee läpäistä vähintään yksi seuraavista tarkistuksista:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Ryhmän jokaisen elementin tulee läpäistä omat tarkistuksensa.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'Tämä arvo ei ole kelvollinen ISIN-koodi (International Securities Identification Number).',
    'This value should be a valid expression.' => 'Tämän arvon on oltava kelvollinen lauseke.',
    'This value is not a valid CSS color.' => 'Tämä arvo ei ole kelvollinen CSS-värimääritys.',
    'This value is not a valid CIDR notation.' => 'Tämä arvo ei ole kelvollinen CIDR-merkintä.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'Verkkomaskille annetun arvon tulee olla {{ min }} - {{ max }}.',
    'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.' => 'Tiedostonimi on liian pitkä. Nimi saa olla enintään yhden merkin pituinen.|Tiedostonimi on liian pitkä. Nimi saa olla enintään {{ filename_max_length }} merkin pituinen.',
    'The password strength is too low. Please use a stronger password.' => 'Salasana on liian heikko. Valitse vahvempi salasana.',
    'This value contains characters that are not allowed by the current restriction-level.' => 'Arvo sisältää merkkejä, joita nykyinen rajoitustaso ei salli.',
    'Using invisible characters is not allowed.' => 'Näkymättömiä merkkejä ei saa käyttää.',
    'Mixing numbers from different scripts is not allowed.' => 'Eri kirjaimistojen numeroita ei saa sekoittaa.',
    'Using hidden overlay characters is not allowed.' => 'Piilotettuja tarkemerkkejä ei saa käyttää.',
    'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.' => 'Tiedostopääte ({{ extension }}) on virheellinen. Sallitut tiedostopäätteet ovat: {{ extensions }}.',
    'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.' => 'Havaittu merkistö on virheellinen ({{ detected }}). Sallitut merkistöt ovat {{ encodings }}.',
    'This value is not a valid MAC address.' => 'Tämä arvo ei ole kelvollinen MAC-osoite.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Autentikointi poikkeus tapahtui.',
    'Authentication credentials could not be found.' => 'Autentikoinnin tunnistetietoja ei löydetty.',
    'Authentication request could not be processed due to a system problem.' => 'Autentikointipyyntöä ei voitu käsitellä järjestelmäongelman vuoksi.',
    'Invalid credentials.' => 'Virheelliset tunnistetiedot.',
    'Cookie has already been used by someone else.' => 'Eväste on jo jonkin muun käytössä.',
    'Not privileged to request the resource.' => 'Ei oikeutta resurssiin.',
    'Invalid CSRF token.' => 'Virheellinen CSRF tunnus.',
    'No authentication provider found to support the authentication token.' => 'Autentikointi tunnukselle ei löydetty tuettua autentikointi tarjoajaa.',
    'No session available, it either timed out or cookies are not enabled.' => 'Sessio ei ole saatavilla, se on joko vanhentunut tai evästeet eivät ole käytössä.',
    'No token could be found.' => 'Tunnusta ei löytynyt.',
    'Username could not be found.' => 'Käyttäjätunnusta ei löydetty.',
    'Account has expired.' => 'Tili on vanhentunut.',
    'Credentials have expired.' => 'Tunnistetiedot ovat vanhentuneet.',
    'Account is disabled.' => 'Tili on poistettu käytöstä.',
    'Account is locked.' => 'Tili on lukittu.',
    'Too many failed login attempts, please try again later.' => 'Liian monta epäonnistunutta kirjautumisyritystä, yritä myöhemmin uudelleen.',
    'Invalid or expired login link.' => 'Virheellinen tai vanhentunut kirjautumislinkki.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Liian monta epäonnistunutta kirjautumisyritystä, yritä uudelleen %minutes% minuutin kuluttua.',
  ),
));

$catalogueEn = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'This value should be false.' => 'This value should be false.',
    'This value should be true.' => 'This value should be true.',
    'This value should be of type {{ type }}.' => 'This value should be of type {{ type }}.',
    'This value should be blank.' => 'This value should be blank.',
    'The value you selected is not a valid choice.' => 'The value you selected is not a valid choice.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.',
    'One or more of the given values is invalid.' => 'One or more of the given values is invalid.',
    'This field was not expected.' => 'This field was not expected.',
    'This field is missing.' => 'This field is missing.',
    'This value is not a valid date.' => 'This value is not a valid date.',
    'This value is not a valid datetime.' => 'This value is not a valid datetime.',
    'This value is not a valid email address.' => 'This value is not a valid email address.',
    'The file could not be found.' => 'The file could not be found.',
    'The file is not readable.' => 'The file is not readable.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.',
    'This value should be {{ limit }} or less.' => 'This value should be {{ limit }} or less.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.',
    'This value should be {{ limit }} or more.' => 'This value should be {{ limit }} or more.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.',
    'This value should not be blank.' => 'This value should not be blank.',
    'This value should not be null.' => 'This value should not be null.',
    'This value should be null.' => 'This value should be null.',
    'This value is not valid.' => 'This value is not valid.',
    'This value is not a valid time.' => 'This value is not a valid time.',
    'This value is not a valid URL.' => 'This value is not a valid URL.',
    'The two values should be equal.' => 'The two values should be equal.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'The file is too large.',
    'The file could not be uploaded.' => 'The file could not be uploaded.',
    'This value should be a valid number.' => 'This value should be a valid number.',
    'This file is not a valid image.' => 'This file is not a valid image.',
    'This is not a valid IP address.' => 'This value is not a valid IP address.',
    'This value is not a valid language.' => 'This value is not a valid language.',
    'This value is not a valid locale.' => 'This value is not a valid locale.',
    'This value is not a valid country.' => 'This value is not a valid country.',
    'This value is already used.' => 'This value is already used.',
    'The size of the image could not be detected.' => 'The size of the image could not be detected.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'This value should be the user\'s current password.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.',
    'The file was only partially uploaded.' => 'The file was only partially uploaded.',
    'No file was uploaded.' => 'No file was uploaded.',
    'No temporary folder was configured in php.ini.' => 'No temporary folder was configured in php.ini, or the configured folder does not exist.',
    'Cannot write temporary file to disk.' => 'Cannot write temporary file to disk.',
    'A PHP extension caused the upload to fail.' => 'A PHP extension caused the upload to fail.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.',
    'Invalid card number.' => 'Invalid card number.',
    'Unsupported card type or invalid card number.' => 'Unsupported card type or invalid card number.',
    'This is not a valid International Bank Account Number (IBAN).' => 'This value is not a valid International Bank Account Number (IBAN).',
    'This value is not a valid ISBN-10.' => 'This value is not a valid ISBN-10.',
    'This value is not a valid ISBN-13.' => 'This value is not a valid ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'This value is neither a valid ISBN-10 nor a valid ISBN-13.',
    'This value is not a valid ISSN.' => 'This value is not a valid ISSN.',
    'This value is not a valid currency.' => 'This value is not a valid currency.',
    'This value should be equal to {{ compared_value }}.' => 'This value should be equal to {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'This value should be greater than {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'This value should be greater than or equal to {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should be identical to {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'This value should be less than {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'This value should be less than or equal to {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'This value should not be equal to {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.',
    'An empty file is not allowed.' => 'An empty file is not allowed.',
    'The host could not be resolved.' => 'The host could not be resolved.',
    'This value does not match the expected {{ charset }} charset.' => 'This value does not match the expected {{ charset }} charset.',
    'This is not a valid Business Identifier Code (BIC).' => 'This value is not a valid Business Identifier Code (BIC).',
    'Error' => 'Error',
    'This is not a valid UUID.' => 'This value is not a valid UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'This value should be a multiple of {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'This value should be valid JSON.',
    'This collection should contain only unique elements.' => 'This collection should contain only unique elements.',
    'This value should be positive.' => 'This value should be positive.',
    'This value should be either positive or zero.' => 'This value should be either positive or zero.',
    'This value should be negative.' => 'This value should be negative.',
    'This value should be either negative or zero.' => 'This value should be either negative or zero.',
    'This value is not a valid timezone.' => 'This value is not a valid timezone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'This password has been leaked in a data breach, it must not be used. Please use another password.',
    'This value should be between {{ min }} and {{ max }}.' => 'This value should be between {{ min }} and {{ max }}.',
    'This value is not a valid hostname.' => 'This value is not a valid hostname.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'The number of elements in this collection should be a multiple of {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'This value should satisfy at least one of the following constraints:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Each element of this collection should satisfy its own set of constraints.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'This value is not a valid International Securities Identification Number (ISIN).',
    'This value should be a valid expression.' => 'This value should be a valid expression.',
    'This value is not a valid CSS color.' => 'This value is not a valid CSS color.',
    'This value is not a valid CIDR notation.' => 'This value is not a valid CIDR notation.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'The value of the netmask should be between {{ min }} and {{ max }}.',
    'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.' => 'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.',
    'The password strength is too low. Please use a stronger password.' => 'The password strength is too low. Please use a stronger password.',
    'This value contains characters that are not allowed by the current restriction-level.' => 'This value contains characters that are not allowed by the current restriction-level.',
    'Using invisible characters is not allowed.' => 'Using invisible characters is not allowed.',
    'Mixing numbers from different scripts is not allowed.' => 'Mixing numbers from different scripts is not allowed.',
    'Using hidden overlay characters is not allowed.' => 'Using hidden overlay characters is not allowed.',
    'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.' => 'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.',
    'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.' => 'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.',
    'This value is not a valid MAC address.' => 'This value is not a valid MAC address.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
    'Too many failed login attempts, please try again later.' => 'Too many failed login attempts, please try again later.',
    'Invalid or expired login link.' => 'Invalid or expired login link.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Too many failed login attempts, please try again in %minutes% minute.',
  ),
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
