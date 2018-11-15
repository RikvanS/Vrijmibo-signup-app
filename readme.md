# Vrijmibo-signup-app

Vrijmibo signup applicatie voor de CodeGorilla bootcamp, gemaakt in Laravel.

De basis is een leeg Laravel project plus de authenticatie structuur door middel van make:auth.
Hierop is doorgebouwd:
Een hoofdpagina met een borrel achtergrond, met een linear gradient voor opacity zodat tekst beter te lezen is en de afbeelding mooier uitkomt.
Op de hoofdpagina wordt een lijst getoond met alle aangemelde deelnemers dmv een foreach loop.

Mits ingelogd kunnen gebruikers op de signup for drinks link klikken, deze is slechts benaderbaar als men ingelogd is en tot die tijd ook niet zichtbaar. Wanneer men hierop klikt krijgt men 2 buttons te zien, een meld aan en een meld af.
De 'meld aan' is een formulier dat dmv een post functie verwijst naar een controller die controleert of de gebruiker al in de database staat en anders een nieuwe entry maakt (Dit is bereikt met een firstOrCreate). Om te voorkomen dat gebruikers anderen aanmelden heb ik gekozen om de aanmelding te laten bestaan uit de momenteel ingelogde gebruiker's naam. Dit door middel van de volgende functie:
$vrijmibo = vrijmibo::firstOrCreate(['naam' => auth()->user()->name]);

Ik pak hiermee de invoer uit het veld 'name' van de tabel user, oftewel de naam die gebruikers opgeven bij registratie.
Deze invoer wordt weggeschreven in de tabel vrijmibo onder het veld 'naam', welke zoals eerder genoemd op de hoofdpagina wordt weergegeven in een foreach loop.

De 'meld af' functie gebruikt een soortgelijke structuur:
$vrijmibo = Vrijmibo::where('naam', auth()->user()->name);
$vrijmibo->delete();

Dit zorgt ervoor dat gebruikers alleen zichzelf kunnen afmelden. NB: Voor een betere, meer future proof oplossing, zouden we moeten kijken naar het gebruik van id's in plaats van namen aangezien deze uniek zijn en namen niet. Aangezien binnen onze groep geen namen 2 keer voorkomen is het nu nog geen probleem maar in een latere versie moet dit uiteraard aangepast. Mits er voor oplevering vrijdag 16/11 tijd voor is staat dit
nog op de agenda.

Verder heb ik aan de hand van https://medium.com/employbl/easily-build-administrator-login-into-a-laravel-5-app-8a942e4fef37
een admin functionaliteit toegevoegd.
Op de live versie heb ik met de heroku console via artisan tinker mezelf aangemerkt als admin. 
De admin pagina bestaat uit een foreach loop waarin ik alle informatie van de deelnemers weergeef (Momenteel bestaat dit uit id, naam en timestamps) plus een form. Hierdoor wordt voor elke entry automatisch een formulier getoond dat bestaat uit een delete knop.
Deze delete functionaliteit zorgt ervoor dat ik, per entry, enkel en alleen die entry kan verwijderen.

Dit is gedaan via de volgende methode (Directe kopie uit m'n prive stream of consciousness klad):

analyse van hoe de admin delete werkt:

admin blade heeft een foreach loop die door alle deelnemers gaat, deze geeft de volledige info weer.
In de foreach heb ik een formulier ingebouwd met een verwijder submit knop. 
De form action verwijst naar de admindelete route, pakt de deelnemer id mee en krijgt een delete mee. 
Deze gehele url (admindelete/{id}/delete) wordt in web aangeroepen en verwijst naar admincontroller@delete, de public delete function van de admin controller.

Deze krijgt $id mee in de functie, creeert een variabele $deelnemer die via het Vrijmibo model met een findorfail functie de meegegeven $id opzoekt en vervolgens delete.
Hierna wordt er een redirect uitgevoerd terug naar admin.

Op deze wijze refereert elke delete knop aan specifiek de $id die bij die entry hoort, waardoor elke knop slechts de betreffende record wist en geen andere.

Aangezien alleen de admin mag en kan deleten heb ik via de heroku console een php artisan tinker uitgevoerd en mezelf aangeduid als admin adhv mn email adres.
De structuur hiervoor is in een eerder stadium opgebouwd adhv https://medium.com/employbl/easily-build-administrator-login-into-a-laravel-5-app-8a942e4fef37

Om de tabellen aan te passen aan de nieuwe kolommen is een migrate fresh uitgevoerd op de heroku pagina waardoor alle logins en registraties zijn gedropt, echter is nu de site meer future proof.
In een echte live setting zou natuurlijk nooit een migrate fresh op een productie omgeving worden uitgevoerd, in dit geval is het echter acceptabel.

--------------

15/11/2018 12:02

Readme aangemaakt, tot op heden is dit blijven liggen.
De huidige versie inclusief admin pagina staat live op heroku. Vanaf dit punt ga ik kijken naar nuttige toevoegingen en werken aan het opschonen van de code en styling.
Mogelijk interessante toevoeging is een pagina waarop gebruikers hun vrijmibo foto's kunnen uploaden, met dank aan Mike voor het idee.