---
id: shortcodes
title: Shortcodes
sidebar_label: Shortcodes
---

På den här sidan har vi en komplett referensguide till alla shortcodes som finns tillgängliga i tillägget,
med alla attribut.

<AUTOGENERATED_TABLE_OF_CONTENTS>

---

## Shortcode-referens

Nästan alla shortcodes nedan kan användas utan attribut,
var noga med att läsa de specifika instruktionerna för varje shortcode.

---

### `[eduadmin-bookingview]`

Shortcoden för att rita ut bokningsformuläret,
som era slutkunder använder sig av för att genomföra sin bokning.

> Tillägget kommer inte fungera utan den. (Ifall ni inte enbart jobbar med intresseanmälningar.)

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| template  | sträng (`template_A`) | template_A |
| courseid  | integer | _null_ |
| hideinvoiceemailfield | boolean | _null_ |
| showinvoiceinformation | boolean | _null_ |

`template`-attributet tillåter er att skapa skräddarsydda bokningssidor
som använder andra mallar. Just nu har vi bara `template_A` tillgänglig för användning.

`courseid`-attributet tillåter er att göra bokningssidor för en specifik kursmall.

`hideinvoiceemailfield`-attributet, om satt till `true`,
så gömmer vi e-post-fältet för fakturor

`showinvoiceinformation`-attributet, om satt till `true`,
så öppnar vi faktura-informationen som standard när bokningsformuläret laddats.

---

### `[eduadmin-coursepublicpricename]`

Används för att skriva ut alla publika prisnamn för en specifik kursmall.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| courseid | integer | _null_ |
| orderby | sträng | _null_ |
| order | sträng (`ASC`, `DESC`) | _null_ |
| numberofprices | integer | _null_ |

Med `courseid`-attributet, så kan ni skriva ut alla prisnamn för en specifik kursmall.

`orderby`-attributet ger er möjligheten att ändra sorteringsordningen på prisnamnen som skrivs ut,
och `order`-attributet bestämmer åt vilket håll den borde sortera.

De fungerar precis som andra `orderby` och `order`-attribut, så de är separerade med mellanslag.
De tillgängliga fälten för sortering finns i [**API-dokumentationen**](https://api.eduadmin.se/?page=read#operation/GetSingleCourseTemplate)
under _Read only OData version 4.0_-sektionen, och sedan _CourseTemplates_,
expandera _PriceNames_-gruppen ute till höger.

Just nu (vid skrivande tillfälle) är dessa fält tillgängliga

```json
{
  "PriceNameId": 0,
  "PriceNameDescription": "string",
  "PublicPriceName": true,
  "GroupPrice": true,
  "Price": 0,
  "PriceNameCode": "string"
}
```

`numberofprices` kommer begränsa mängden synliga prisnamn (om det finns mer än ett angivet), 
till numret ni fyller i attributet.

---

### `[eduadmin-detailinfo]`

Den här shortcoden används när ni vill skapa er egna skräddarsydda mall för en [**detaljvy**](#eduadmin-detailview).

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| courseid | integer | _null_ |
| coursename | boolean | null |
| coursepublicname | boolean | null |
| courselevel | boolean | null |
| courseimage | boolean | null |
| courseimagetext | boolean | null |
| coursedays | boolean | null |
| coursestarttime | boolean | null |
| courseendtime | boolean | null |
| courseprice | boolean | null |
| eventprice | boolean | null |
| coursedescriptionshort | boolean | null |
| coursedescription | boolean | null |
| coursegoal | boolean | null |
| coursetarget | boolean | null |
| courseprerequisites | boolean | null |
| courseafter | boolean | null |
| coursequote | boolean | null |
| courseeventlist | boolean | null |
| showmore | integer | null |
| courseattributeid | integer | null |
| courseeventlistfiltercity | boolean | null |
| pagetitlejs | boolean | null |
| bookurl | boolean | null |
| courseinquiryurl | boolean | null |
| order | sträng (`ASC`, `DESC`) | _null_ |
| orderby | sträng | _null_ |

Vi kommer gå igenom attributen på [*skräddarsydda mallar*](custom-template.md)-sidan.

---

### `[eduadmin-detailview]`

Skriver ut standard-detaljvyn, ni kan välja mellan två mallar (`template_A` och `template_B`).

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| template | sträng (`template_A`, `template_B`) | template_A |
| courseid | integer | _null_ |
| customtemplate | boolean | _null_ |
| showmore | integer | _null_ |
| hide | sträng | _null_ |

Genom att sätta `template`-attributet, så kan ni forcera vilken mall ni vill använda.

Med `courseid`-attributet, så kan ni skapa en detaljsida för en specifik kursmall.

Om ni lägger på `customtemplate`-attributet, så kan ni skapa er egna [*skräddarsydda detaljsida*](custom-template.md).

`showmore`-attributet kommer begränsa mängden synliga tillfällen i tillfälleslistan 
innan den börjar visa en _Visa mer_-länk för att visa alla tillfällen

`hide`-attributet låter er dölja vissa delar från standarddetaljsidan, om ni vill det.

Sektioner som ni kan dölja är
- description
- goal
- target
- prerequisites
- after
- quote
- time
- price

---

### `[eduadmin-eventinterest]`

Den här shortcoden kommer att rita ut intresseanmälanformuläret för en kursmall och ett specifikt tillfälle.

Just nu har shortcoden inga attribut som kan påverka den.

---

### `[eduadmin-listview]`

En av huvud-shortcodesen, som visar slutanvändaren en lista av era kurser/tillfällen.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| template | sträng (`template_A`, `template_B`) | template_A |
| category | sträng | _null_ |
| subject | sträng | _null_ |
| subjectid | integer | _null_ |
| hidesearch | boolean | false |
| onlyevents | boolean | false |
| onlyempty | boolean | false |
| numberofevents | numeric | _null_ |
| mode | sträng | _null_ |
| orderby | sträng | _null_ |
| order | sträng (`ASC`, `DESC`) | _null_ |
| showsearch | boolean | _null_ |
| showmore | boolean | _null_ |
| showcity | boolean | true |
| showbookbtn | boolean | true |
| showreadmorebtn | boolean | true |
| city | integer | _null_ |
| courselevel | integer | _null_ |
| searchCourse | sträng | _null_ |
| filtercity | sträng | _null_ |
| hideimages | boolean | _null_ |
| showimages | boolean | _null_ |

Med `template`-attributet, så kan ni forcera vilken mall ni vill använda för listsidan.

`category`-attributet låter er fylla i en sträng för att matcha kategorier i [**EduAdmin**](https://www.eduadmin.se), 
så att listan filtrerar resultaten baserat på träffarna.

`subject`-attributet låter er fylla i en sträng för att matcha på ämnen i [**EduAdmin**](https://www.eduadmin.se), 
så att listan filtrerar resultaten baserat på träffarna.

`subjectid`-attributet låter er filtrera listan på ett specifikt ämne, baserat på dess ID.

Om ni använder `hidesearch`-attributet, så kan ni dölja sökfälten.

`onlyevents`-attributet kommer att filtrera listan, så att bara kursmallar som innehåller tillfällen kommer synas.

`onlyempty`-attributet kommer bara visa kursmallar som inte har kommande tillfällen.

`numberofevents`-attributet begränsar antalet synliga tillfällen,
som standard visar vi alla tillgängliga resultat från APIet.

Ni kan sätta `mode`-attributet till antingen `event` eller `course`, 
för att få listan att visa antingen tillfällen eller kursmallar.

`orderby`-attributet ger er möjligheten att justera sorteringsordningen på resultatet,
och `order`-attributet bestämmer åt vilket håll den ska sortera.

`showsearch` kommer göra så att sökfälten visas.

`showmore` aktiverar _Visa mer_-länken och begränsar antalet synliga resultat.

`showcity`-attributet kommer att visa orten där tillfället hålls (om tillämpligt)

Och `showbookbtn`-attributet kommer bestämma ifall ni vill visa _Boka_-knappen i tillfälleslistan.

`showreadmorebtn`-attributet bestämmer om ni vill visa _Läs mer_-knappen.

`city`-attributet kommer filtrera listan till att visa tillfällen som hålls i den specifierade orten (`LocationId`).

`courselevel`-attributet filtrerar listan till att visa kursmallar som faller under den valda kursnivån.

`searchCourse`-attributet kontrollerar fritextsökningen.

Ifall ni använder `filtercity`-attributet, så kommer listan att filtreras baserat på det ni fyllt i.

`hideimages`-attributet kommer att dölja kursbilderna, ifall det var aktiverat i admininställningarna.

`showimages`-attributet kommer göra så att kursbilderna kommer synas, 
ifall det var avstängt i admininställningarna.

---

### `[eduadmin-loginview]`

Ritar ut inloggning och profilsidorna (ifall inloggning används).

Har inga attribut för att skräddarsy saker för tillfället.

---

### `[eduadmin-loginwidget]`

Den här shortcoden ritar ut en _widget_ för att hantera inloggningsinformation.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| logintext  | sträng | Log in |
| logouttext  | sträng | Log out |
| guesttext | sträng | Guest |

`logintext`-attributet ändrar texten på _Logga in_-knappen/länken till det ni fyller i här

`logouttext`-attributet ändrar texten på _Logga ut_-knappen/länken till det ni fyller i här

`guesttext`-attributet ändrar texten på _Gäst_-elementet till det ni fyller i

---

### `[eduadmin-objectinterest]`

Den här shortcoden kommer rita ut ett intresseanmälningsformulär, för en kursmall.
Det kan användas med och utan attributet `courseid`, beroende på hur det ska användas.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| courseid | integer | _null_ |

`courseid`-attributet gör att shortcoden kommer rita ut formuläret för en specifik kursmall.

---

### `[eduadmin-programme-book]`

Som med den andra bokningsvyn, så är den här viktig ifall ni vill kunna få in programbokningar från era slutanvändare.
Den kommer att rita ut ett fördefinierat formulär med all information som behövs för att boka programmet.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| programmeid | integer | _null_ |
| programmestartid | integer | _null_ |

Ni kan också bygga statiska sidor och lägga till attributet `programmeid` för att göra sidan för ett specifikt program.
Och ni kan även ange `programmestartid`, så att det binds till en specifik programstart.

---

### `[eduadmin-programme-detail]`

Detta är detaljvyn, för att titta på ett specifikt program,
det kan användas för att skapa sidor för specifika program,
eller som standardsida för alla program.

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| programmeid | integer | _null_ |

Om ni vill skapa en specifik sida för ett program,
så kan ni använda er av `programmeid`-attributet.

---

### `[eduadmin-programme-list]`

Som med kurslistvyn, så listar den här vyn de tillgängliga programmen ni skapat i [**EduAdmin**](https://www.eduadmin.se).

| Attribut | Värdetyp | Standardvärde |
|:----------|:----------:|:-------------:|
| category | sträng | _null_ |

Och ifall ni vill filtrera listan, så kan ni lägga till `category`-attributet.

---
