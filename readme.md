<h1>📅 Afspraken- en Boekingssysteem</h1>

<h2>Overzicht</h2>
<p>
Dit project betreft een <strong>afspraken- en boekingssysteem</strong> waarmee een beheerder (admin)
afspraken kan aanmaken en beheren, en klanten eenvoudig boekingen kunnen maken op beschikbare momenten.
Het systeem is geschikt voor dienstverleners die werken met tijdsloten, pakketten en inkomstenregistratie.
</p>

<p>
Het systeem bestaat uit twee hoofdonderdelen:
</p>
<ul>
    <li><strong>Admin dashboard</strong></li>
    <li><strong>Publieke gebruikersomgeving (klanten)</strong></li>
</ul>

<hr>

<h2>🎛️ Admin Functionaliteiten</h2>

<h3>Dashboard</h3>
<p>
De admin beschikt over een centraal dashboard waarin alle belangrijke informatie overzichtelijk wordt weergegeven:
</p>
<ul>
    <li>Aantal boekingen</li>
    <li>Totale inkomsten</li>
    <li>Totale uitgaven</li>
    <li>Netto omzet</li>
    <li>Klantgegevens en boekingsgeschiedenis</li>
</ul>

<h3>📆 Afsprakenbeheer (FullCalendar)</h3>
<p>
De admin kan afspraken en beschikbare tijdsloten beheren via <strong>FullCalendar</strong>.
</p>
<ul>
    <li>Aanmaken van beschikbare tijdsloten</li>
    <li>Wijzigen van bestaande afspraken</li>
    <li>Annuleren van afspraken</li>
    <li>Koppelen van afspraken aan pakketten</li>
    <li>Automatisch blokkeren van volgeboekte of verlopen tijdsloten</li>
</ul>

<h3>👥 Klant- en Boekingsbeheer</h3>
<p>
Bij elke boeking vult de klant een formulier in met zijn of haar gegevens, waaronder:
</p>
<ul>
    <li>Naam</li>
    <li>Contactgegevens</li>
    <li>Gekozen pakket</li>
    <li>Datum en tijd van de boeking</li>
</ul>

<p>
De admin kan alle boekingen inzien, per klant bekijken en gebruiken voor rapportages.
</p>

<h3>💰 Inkomsten &amp; Uitgaven</h3>
<ul>
    <li>Elke boeking wordt automatisch geregistreerd als inkomsten</li>
    <li>De admin kan handmatig uitgaven toevoegen (bijv. personeelskosten of vaste lasten)</li>
    <li>Automatische berekening van:
        <ul>
            <li>Totale inkomsten</li>
            <li>Totale uitgaven</li>
            <li>Netto omzet</li>
        </ul>
    </li>
    <li>Mogelijkheid om gegevens te filteren per periode (bijv. maand of jaar)</li>
</ul>

<h3>📦 Pakkettenbeheer</h3>
<p>
De admin kan pakketten aanmaken die klanten kunnen boeken.
</p>
<ul>
    <li>Naam van het pakket</li>
    <li>Beschrijving</li>
    <li>Prijs</li>
    <li>Duur</li>
</ul>
<p>
Pakketten zijn te koppelen aan beschikbare tijdsloten en bepalen wat klanten kunnen boeken.
</p>

<hr>

<h2>🌐 Gebruikersomgeving (Klanten)</h2>

<h3>Publieke Website</h3>
<p>
Klanten krijgen een overzichtelijke en gebruiksvriendelijke website te zien met:
</p>
<ul>
    <li>Een hero section met uitleg over de dienst</li>
    <li>Overzicht van beschikbare pakketten</li>
    <li>Duidelijke call-to-actions om een boeking te maken</li>
</ul>

<h3>📦 Pakketten &amp; Beschikbaarheid</h3>
<ul>
    <li>Inzicht in beschikbare pakketten</li>
    <li>Weergave van prijs en inhoud per pakket</li>
    <li>Overzicht van beschikbare tijdsloten per pakket</li>
    <li>Alleen beschikbare momenten zijn boekbaar</li>
</ul>

<h3>📝 Boekingsproces</h3>
<p>
Het boekingsproces voor klanten bestaat uit:
</p>
<ol>
    <li>Kiezen van een pakket</li>
    <li>Selecteren van een beschikbare datum en tijd</li>
    <li>Invullen van een formulier met persoonlijke gegevens</li>
</ol>

<p>
Na bevestiging wordt de boeking vastgelegd in het systeem en direct zichtbaar in het admin dashboard.
</p>

<hr>

<h2>🔐 Rollen &amp; Rechten</h2>
<ul>
    <li>
        <strong>Admin</strong>
        <ul>
            <li>Volledige toegang tot het dashboard</li>
            <li>Beheer van afspraken, pakketten, inkomsten en uitgaven</li>
        </ul>
    </li>
    <li>
        <strong>Gebruiker (klant)</strong>
        <ul>
            <li>Kan pakketten bekijken en boekingen maken</li>
            <li>Geen toegang tot adminfunctionaliteiten</li>
        </ul>
    </li>
</ul>

<hr>

<h2>🎯 Doel van het Systeem</h2>
<ul>
    <li>Efficiënt afspraken beheren</li>
    <li>Inzicht krijgen in inkomsten en omzet</li>
    <li>Klantboekingen automatiseren</li>
    <li>Overzicht en controle behouden voor de admin</li>
</ul>
