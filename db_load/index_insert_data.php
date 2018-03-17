<?php
include('vars.inc');
$db = mysqli_connect ($servername, $username, $password, $database);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

// INSERT SYSTEM DATA ------------------------------------

// Insert into table `system_dictionary`
$query = "INSERT INTO `system_dictionary` (`de`, `en`,`fr`, `it`, `pl`, `ru`, `sp`, `ua`) VALUES
('Sinnlöcher', 'Sense holes', 'Trous sens', 'Buchi significati', 'Sensowe dziury', 'Смысловые дыры', 'Sentido agujeros', 'Діри сенсу'),
('Solipsismus', 'Solipsism', 'Solipsisme', 'Solipsismo', 'Solipsyzm', 'Солипсизм', 'Solipsismo', 'Соліпсизм'),
('Postsolipsismus', 'Postsolipsism', 'Postsolipsisme', 'Postsolipsismo', 'Postsolipsyzm', 'Постсолипсизм', 'Postsolipsismo', 'Постсоліпсизм'),
('Hauptseite', 'Main page', 'Page d\'accueil', 'Page principale', 'Strona główna', 'Главная страница', 'Página principal', 'Головна сторінка'), 
('Login', 'Login', 'Login', 'Login', 'Login', 'Вход', 'Login', 'Вхід'), 
('Logout', 'Logout', 'Logout', 'Logout', 'Logout', 'Выход', 'Logout', 'Вихід'), 
('Noch mehr', 'More', 'Plus', 'Più', 'Więcej', 'Дальше', 'Más', 'Далі'), 
('Kein Inhalts', 'No content', 'Aucun contenu', 'Nessun contenuto', 'Brak treści', 'Нет контента', 'No hay contenido', 'Нема контенту'),
('Erstellen Sie Inhalte', 'Create content', 'Créer un contenu', 'Ceare contenuti', 'Stworzyć treść', 'Создать контент', 'Crear contenido', 'Створити контент'),
('Neue Inhalte', 'New content', 'Nouveau contenu', 'Nuovo contenuto', 'Nowa treść', 'Новый контент', 'Nuevo contenido', 'Новий контент');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'system_dictionary'.<br>");
} else {
	printf("Not inserted into table 'system_dictionary'.<br>");
}

// Insert into table `languages`
$query = "INSERT INTO `languages` (`language_symbol`, `language_name`) VALUES
('de', 'Deutsch'), 
('en', 'English'), 
('fr', 'Français'), 
('it', 'Italiano'), 
('pl', 'Polski'), 
('ru', 'Русский'), 
('sp', 'Español'), 
('ua', 'Українська');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'languages'.<br>");
} else {
	printf("Not inserted into table 'languages'.<br>");
}

// Insert into table `directions`
$query = "INSERT INTO `directions` (`direction_id`, `direction_de`, `direction_en`, `direction_fr`, `direction_it`, `direction_pl`, `direction_ru`, `direction_sp`, `direction_ua`) VALUES
('0', 'Nachrichten', 'News', 'Nouvelles', 'Notizia', 'Wiadomości', 'Новости', 'Noticia', 'Новини'), 
('1', 'Philosophie', 'Philosophy', 'Philosophie', 'Filosofia', 'Filozofia', 'Философия', 'Filosofía', 'Філософія'),
('2', 'Religion', 'Religion', 'Religion', 'Religione', 'Religia', 'Религия', 'Religión', 'Релігія'),
('3', 'Rechtswissenschaft', 'Jurisprudence', 'Jurisprudence', 'Giurisprudenza', 'Nauki prawne', 'Юриспруденция', 'Jurisprudencia', 'Юриспруденція'),
('4', 'Staat', 'State', 'Etat', 'Stato', 'Państwo', 'Государство', 'Estado', 'Держава'),
('5', 'Volkswirtschaft', 'Economy', 'Économie', 'Economia', 'Gospodarka', 'Экономика', 'Economía', 'Економіка'),
('6', 'Technologie', 'Technology', 'Technologie', 'Tecnologia', 'Technologia', 'Технология', 'Tecnología', 'Технологія'),
('7', 'Psychologik', 'Psychologic', 'Psychologique', 'Psicologica', 'Psychologika', 'Психологика', 'Psicologica', 'Психологіка'),
('8', 'Kunst', 'Art', 'Art', 'Arte', 'Sztuka', 'Искусство', 'Arte', 'Мистецтво'),
('9', 'Kontakt', 'Contact', 'Contact', 'Contact', 'Kontakt', 'Контакт', 'Contact', 'Контакт');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'directions'.<br>");
} else {
	printf("Not inserted into table 'directions'.<br>");
}

// Insert into table `direction_aside`
$query = "INSERT INTO `direction_aside` (`direction_aside_id`, `direction_aside_de`, `direction_aside_en`, `direction_aside_fr`, `direction_aside_it`, `direction_aside_pl`, `direction_aside_ru`, `direction_aside_sp`, `direction_aside_ua`) VALUES
('1', 'Topisch', 'Topical', 'Actuel', 'Attuale', 'Aktualne', 'Актуальное', 'Actual', 'Актуальне'), 
('2', 'Kritik', 'Criticism', 'Critique', 'Critica', 'Krytyka', 'Критика', 'Crítica', 'Критика'), 
('3', 'Bücherei', 'Library', 'Bibliothèque', 'Biblioteca', 'Biblioteka', 'Библиотека', 'Biblioteca', 'Бібліотека');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'direction_aside'.<br>");
} else {
	printf("Not inserted into table 'direction_aside'.<br>");
}

// Insert into table `direction_subaside`
//('2', '1', 'Bekanntmachungen', 'Publications', 'Publications', 'Pubblicazione', 'Publikacje', 'Публикации', 'Publicación', 'Публікації'), 
$query = "INSERT INTO `direction_subaside` 
(`direction_aside_id`,
 `direction_subaside_numb`,
 `direction_subaside_de`,
 `direction_subaside_en`,
 `direction_subaside_fr`,
 `direction_subaside_it`,
 `direction_subaside_pl`,
 `direction_subaside_ru`,
 `direction_subaside_sp`,
 `direction_subaside_ua`) VALUES
('1', '1', 'Maßnahmen', 'Events', 'Mesures', 'Misure', 'Przedsięwzięcia', 'Мероприятия', 'Medidas', 'Заходи'), 
('1', '2', 'Annotationen', 'Annotations', 'Annotations', 'Annotazioni', 'Adnotacje', 'Аннотации', 'Anotaciones', 'Анотації'),
('2', '1', 'Kategorieen', 'Categories', 'Catégories', 'Categorie', 'Kategorie', 'Категории', 'Categoría', 'Категорії'), 
('2', '2', 'Autoren', 'Authors', 'Auteurs', 'Autori', 'Autorzy', 'Авторы', 'Autores', 'Автори'),
('2', '3', 'Datentypen', 'Types of data', 'Types de données', 'Tipi di dati', 'Rodzaje danych', 'Типы данных', 'Tipos de datos', 'Типи даних'),
('3', '1', 'Kategorieen', 'Categories', 'Catégories', 'Categorie', 'Kategorie', 'Категории', 'Categoría', 'Категорії'), 
('3', '2', 'Autoren', 'Authors', 'Auteurs', 'Autori', 'Autorzy', 'Авторы', 'Autores', 'Автори'),
('3', '3', 'Datentypen', 'Types of data', 'Types de données', 'Tipi di dati', 'Rodzaje danych', 'Типы данных', 'Tipos de datos', 'Типи даних');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'direction_subaside'.<br>");
} else {
	printf("Not inserted into table 'direction_subaside'.<br>");
}

// Insert into table `direction_subaside_title`
$query = "INSERT INTO `direction_subaside_title` 
(`direction_aside_id`,
 `direction_subaside_numb`,
 `direction_subaside_title_de`,
 `direction_subaside_title_en`,
 `direction_subaside_title_fr`,
 `direction_subaside_title_it`,
 `direction_subaside_title_pl`,
 `direction_subaside_title_ru`,
 `direction_subaside_title_sp`,
 `direction_subaside_title_ua`) VALUES
('2', '1', 'Alle Kategorieen', 'All categories', 'Tous les catégories', 'Tutte le categorie', 'Wszystkie kategorie', 'Все категории', 'Todas las categorías', 'Всі категорії'),
('2', '2', 'Alle Autoren', 'All authors', 'Tous les auteurs', 'Tutti gli autori', 'Wszyscy autorzy', 'Все авторы', 'Todos los autores', 'Всі автори'),
('2', '3', 'Alle Typen', 'All types', 'Tous les types', 'Tutti i tipi', 'Wszystkie rodzaje', 'Все типы', 'Todos los tipos', 'Всі типи'),
('3', '1', 'Alle Kategorieen', 'All categories', 'Tous les catégories', 'Tutte le categorie', 'Wszystkie kategorie', 'Все категории', 'Todas las categorías', 'Всі категорії'),
('3', '2', 'Alle Autoren', 'All authors', 'Tous les auteurs', 'Tutti gli autori', 'Wszyscy autorzy', 'Все авторы', 'Todos los autores', 'Всі автори'),
('3', '3', 'Alle Typen', 'All types', 'Tous les types', 'Tutti i tipi', 'Wszystkie rodzaje', 'Все типы', 'Todos los tipos', 'Всі типи');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'direction_subaside_title'.<br>");
} else {
	printf("Not inserted into table 'direction_subaside_title'.<br>");
}

// Insert into table `content_status`
$query = "INSERT INTO `content_status` 
(`content_status_de`,
 `content_status_en`,
 `content_status_fr`,
 `content_status_it`,
 `content_status_pl`,
 `content_status_ru`,
 `content_status_sp`,
 `content_status_ua`) VALUES
('Maßnahmen', 'Events', 'Mesures', 'Misure', 'Przedsięwzięcia', 'Мероприятия', 'Medidas', 'Заходи'), 
('Annotationen', 'Annotations', 'Annotations', 'Annotazioni', 'Adnotacje', 'Аннотации', 'Anotaciones', 'Анотації'), 
('Kritik', 'Criticism', 'Critique', 'Critica', 'Krytyka', 'Критика', 'Crítica', 'Критика'),
('Bücherei', 'Library', 'Bibliothèque', 'Biblioteca', 'Biblioteka', 'Библиотека', 'Biblioteca', 'Бібліотека');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_status'.<br>");
} else {
	printf("Not inserted into table 'content_status'.<br>");
}

// Insert into table `content_categories`
$query = "INSERT INTO `content_categories` 
(`direction_id`,
 `content_category_de`,
 `content_category_en`,
 `content_category_fr`,
 `content_category_it`,
 `content_category_pl`,
 `content_category_ru`,
 `content_category_sp`,
 `content_category_ua`) VALUES
('1', 'Methodologie', 'Methodology', 'Méthodologie', 'Metodologia', 'Metodologia', 'Методология', 'Metodología', 'Методологія'),
('1', 'Ontologie', 'Ontology', 'Ontologie', 'Ontologia', 'Ontologia', 'Онтология', 'Ontología', 'Онтологія'),
('1', 'Erkenntnistheorie', 'Epistemology', 'Épistémologie', 'Epistemologia', 'Epistemologia', 'Эпистемология', 'Epistemología', 'Епістемологія'),
('1', 'Logik', 'Logic', 'Logique', 'Logica', 'Logika', 'Логика', 'Lógica', 'Логіка'),
('1', 'Ethik', 'Ethics', 'Éthique', 'Etica', 'Etyka', 'Этика', 'Ética', 'Етика'),
('1', 'Ästhetik', 'Aesthetics', 'Esthétique', 'Estetica', 'Estetyka', 'Эстетика', 'Estética', 'Естетика'),
('1', 'Axiologie', 'Axiology', 'Axiologie', 'Assiologia', 'Aksjologia', 'Аксиология', 'Axiología', 'Аксіологія'),
('1', 'Praxeologie', 'Praxeology', 'Praxéologie', 'Prasseologia', 'Prakseologia', 'Праксиология', 'Praxeología', 'Праксеологія'),
('1', 'Anthropologie', 'Anthropology', 'Anthropologie', 'Antropologia', 'Antropologia', 'Антропология', 'Antropología', 'Антропологія'),
('1', 'Sozialphilosophie', 'Social philosophy', 'Philosophie sociale', 'Filosofia sociale', 'Filozofia społeczna', 'Социальная философия', 'Filosofía social', 'Соціальна філософія'),
('1', 'Alltagsphilosophie', 'Philosophy of everyday life', 'Philosophie de la vie quotidienne', 'Filosofia di giornalménte', 'Filozofia powszedniości', 'Философия повседневности', 'Filosofía de la vida cotidiana', 'Філософія повсякденності'),
('2', 'Theologie', 'Theology', 'Théologie', 'Teologia', 'Teologia', 'Теология', 'Teología', 'Теологія'),
('2', 'Supranaturalismus', 'Supernatural', 'Surnaturel', 'Soprannaturale', 'Nadprzyrodzone', 'Сверхъестественное', 'Sobrenatural', 'Надприродне'),
('2', 'Mystik', 'Mysticism', 'Mystique', 'Mistica', 'Mistycyzm', 'Мистицизм', 'Misticismo', 'Містицизм'),
('2', 'Moral', 'Morality', 'Morale', 'Morale', 'Moralność', 'Мораль', 'Moral', 'Мораль'),
('2', 'Glaube', 'Faith', 'Foi', 'Fede', 'Wiara', 'Вера', 'Fe', 'Віра'),
('2', 'Spiritualität', 'Spirituality', 'Spiritualité', 'Spiritualità', 'Duchowość', 'Духовность', 'Espiritualidad', 'Духовність'),
('2', 'Magie', 'Magic', 'Magie', 'Magia', 'Magia', 'Магия', 'Magia', 'Магія'),
('2', 'Heidentum', 'Paganism', 'Paganisme', 'Paganesimo', 'Pogaństwo', 'Язычество', 'Paganismo ', 'Язичництво'),
('2', 'Hinduismus', 'Hinduism', 'Hindouisme', 'Induismo', 'Hinduizm', 'Индуизм', 'Hinduismo', 'Індуїзм'),
('2', 'Buddhismus', 'Buddhism', 'Bouddhisme', 'Buddhismo', 'Buddyzm', 'Буддизм', 'Budismo', 'Буддизм'),
('2', 'Judentum', 'Judaism', 'Judaïsme', 'Ebraismo', 'Judaizm', 'Иудаизм', 'Judaísmo', 'Юдаїзм'),
('2', 'Christentum', 'Christianity', 'Christianisme', 'Cristianesimo', 'Chrześcijaństwo', 'Христианство', 'Cristianismo', 'Християнство'),
('2', 'Islam', 'Islam', 'Islam', 'Islam', 'Islam', 'Ислам', 'Islam', 'Іслам'),
('2', 'Theodizee', 'Theodicy', 'Théodicée', 'Teodicea', 'Teodycea', 'Теодицея', 'Teodicea', 'Теодицея'),
('2', 'Gottesbeweis', 'Existence of God', 'Existence de Dieu', 'Esistenza di Dio', 'Istnienia Boga', 'Бытие Бога', 'Existencia de Dios', 'Буття Бога'),
('3', 'Rechtsordnung', 'Legal system', 'Système juridique', 'Ordinamento giuridico', 'Porządek prawny', 'Система права', 'Ordenamiento jurídico', 'Система права'),
('3', 'Verfassungsrecht', 'Constitutional law', 'Droit constitutionnel', 'Diritto costituzionale', 'Prawo konstytucyjne', 'Конституционное право', 'Derecho constitucional', 'Конституційне право'),
('3', 'Verwaltungsrecht', 'Administrative law', 'Droit administratif', 'Diritto amministrativo', 'Prawo administracyjne', 'Административное право', 'Derecho administrativo', 'Адміністративне право'),
('3', 'Relativität der Rechtsbegriffe', 'Civil law', 'Droit civil', 'Diritto civile', 'Prawo cywilne', 'Гражданское право', 'Derecho civil', 'Цивільне право'),
('3', 'Landnutzung', 'Land use law', 'Utilisation du sol', 'Possesso della terre', 'Rolne prawo', 'Земельное право', 'Usos del suelo', 'Земельне право'),
('3', 'Steuerrecht', 'Tax law', 'Droit fiscal', 'Diritto tributario', 'Prawo podatkowe', 'Налоговое право', 'Derecho tributario', 'Податкове право'),
('3', 'Familienrecht', 'Family law', 'Droit de la famille', 'Diritto di famiglia', 'Prawo rodzinne', 'Семейное право', 'Derecho de familia', 'Сімейне право'),
('3', 'Zollsanrecht', 'Customs law', 'Droit douanière', 'Diritto doganale', 'Prawo celne', 'Таможенное право', 'Derecho aduanero', 'Митне право'),
('3', 'Arbeitsrecht', 'Labour law', 'Droit du travail', 'Diritto del lavoro', 'Prawo pracy', 'Трудовое право', 'Derecho laboral', 'Трудове право'),
('3', 'Strafrecht', 'Criminal law', 'Droit pénal', 'Diritto penale', 'Prawo karne', 'Уголовное право', 'Derecho penal', 'Кримінальне право'),
('3', 'Finanzrecht', 'Financial law', 'Droit financier', 'Diritto finanziaria', 'Prawo finansowe', 'Финансовое право', 'Derecho financiero', 'Фінансове право'),
('3', 'Wirtschaftsrecht', 'Economic law', 'Droit commercial', 'Diritto economica', 'Prawo gospodarcze', 'Хозяйственное право', 'Derecho económico', 'Господарське право'),
('3', 'Verfahrensrecht', 'Procedural law', 'Droit procédural', 'Diritto processuale', 'Prawo procesowe', 'Процессуальное право', 'Derecho procesal', 'Процесуальне право'),
('3', 'Völkerrecht', 'International law', 'Droit international', 'Diritto internazionale', 'Prawo międzynarodowe', 'Международное право', 'Derecho internacional', 'Міжнародне право'),
('3', 'Menschenrechte', 'Human rights', 'Droits de l\'homme', 'Diritti umani', 'Prawa człowieka', 'Права человека', 'Derechos humanos', 'Права людини'),
('3', 'Gerechtigkeit', 'Justice', 'Justice', 'Giustizia', 'Sprawiedliwość', 'Правосудие', 'Justicia', 'Правосуддя'),
('3', 'Rechtsphilosophie', 'Philosophy of law', 'Philosophie du droit', 'Filosofia del diritto', 'Filozofia prawa', 'Философия права', 'Filosofía del derecho', 'Філософія права'),
('3', 'Rechtspsychologie', 'Legal psychology', 'Psychologie juridique', 'Psicologia legale', 'Psychologia prawna', 'Юридическая психология', 'Psicología jurídica', 'Юридична психологія'),
('3', 'Gesetzgebung', 'Legislation', 'Législation', 'Normazione', 'Legislacja', 'Законодательство', 'Legislación', 'Законодавство'),
('4', 'Politisches System', 'Political system', 'Système politique', 'Sistema politico', 'System polityczny', 'Политическая система', 'Sistema político', 'Політична система'),
('4', 'Politische Macht', 'Political power', 'Pouvoir politique', 'Potere politico', 'Władza polityczna', 'Политическая власть', 'Poder político', 'Політична влада'),
('4', 'Legislative', 'Legislature', 'Pouvoir législatif', 'Potere legislativo', 'Władza ustawodawcza', 'Законодательная власть', 'Poder legislativo', 'Законодавча влада'),
('4', 'Exekutive', 'Executive', 'Pouvoir exécutif', 'Potere esecutivo', 'Władza wykonawcza', 'Исполнительная власть', 'Poder ejecutivo', 'Виконавча влада'),
('4', 'Judikative', 'Judiciary', 'Pouvoir judiciaire', 'Potere giudiziario', 'Władza sądownicza', 'Судебная власть', 'Poder judicial', 'Судова влада'),
('5', 'Mikroökonomie', 'Microeconomics', 'Microéconomie', 'Microeconomia', 'Mikroekonomia', 'Микроэкономика', 'Microeconomía', 'Мікроекономіка'),
('5', 'Makroökonomie', 'Macroeconomics', 'Macroéconomie', 'Macroeconomia', 'Makroekonomia', 'Макроэкономика', 'Macroeconomía', 'Макроекономіка'),
('5', 'Weltwirtschaft', 'World economy', 'Économie mondiale', 'Economia mondiale', 'Gospodarka światowa', 'Мировая экономика', 'Economía global', 'Світова економіка'),
('5', 'Wirtschaftstheorie', 'Economics', 'Théorie économique', 'La teoria economica', 'Teoria ekonomii', 'Экономическая теория', 'Teoría económica', 'Економічна теорія'),
('7', 'Psychologie', 'Psychology', 'Psychologie', 'Psicologia', 'Psychologia', 'Психология', 'Psicología', 'Психологія'),
('8', 'Literatur', 'Literature', 'Littérature', 'Letteratura', 'Literatura', 'Литература', 'Literatura', 'Література');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_categories'.<br>");
} else {
	printf("Not inserted into table 'content_categories'.<br>");
}

// Insert into table `content_types`
$query = "INSERT INTO `content_types` 
(`content_type_de`,
 `content_type_en`,
 `content_type_fr`,
 `content_type_it`,
 `content_type_pl`,
 `content_type_ru`,
 `content_type_sp`,
 `content_type_ua`) VALUES
('Video', 'Video', 'Vidéo', 'Video', 'Wideo', 'Видео', 'Vídeo', 'Відео'),
('Audio', 'Audio', 'Audio', 'Audio', 'Audio', 'Аудио', 'Audio', 'Аудіо'),
('Bücher', 'Books', 'Livres', 'Libri', 'Książki', 'Книги', 'Libros', 'Книги'),
('Artikel', 'Articles', 'Articles', 'Artìcoli', 'Artykuły', 'Статьи', 'Artículos', 'Статті'),
('Berichte', 'Reports', 'Rapports', 'Rapporti', 'Odczyty', 'Доклады', 'Informes', 'Доклади'),
('Trainings', 'Trainings', 'Trainings', 'Trainings', 'Treningi', 'Тренинги', 'Trainings', 'Тренінги');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_types'.<br>");
} else {
	printf("Not inserted into table 'content_types'.<br>");
}

// Insert into table `content_authors`
$query = "INSERT INTO `content_authors` 
(`content_author_name_de`,
 `content_author_name_en`,
 `content_author_name_fr`,
 `content_author_name_it`,
 `content_author_name_pl`,
 `content_author_name_ru`,
 `content_author_name_sp`,
 `content_author_name_ua`,
 `content_author_surname_de`,
 `content_author_surname_en`,
 `content_author_surname_fr`,
 `content_author_surname_it`,
 `content_author_surname_pl`,
 `content_author_surname_ru`,
 `content_author_surname_sp`,
 `content_author_surname_ua`,
 `content_author_reg_date`) VALUES
('Sergij', 'Sergij', 'Sergij', 'Sergij', 'Sergij', 'Сергей', 'Sergij', 'Сергій', 'Bondarenko', 'Bondarenko', 'Bondarenko', 'Bondarenko', 'Bondarenko', 'Бондаренко', 'Bondarenko', 'Бондаренко', '".date('Y-m-d H:i:s')."'),
('Martin', 'Martin', 'Martin', 'Martin', 'Martin', 'Мартин', 'Martin', 'Мартін', 'Heidegger', 'Heidegger', 'Heidegger', 'Heidegger', 'Heidegger', 'Хайдеггер', 'Heidegger', 'Гайдеггер', '".date('Y-m-d H:i:s')."'),
('Jean-Paul', 'Jean-Paul', 'Jean-Paul', 'Jean-Paul', 'Jean-Paul', 'Жан-Поль', 'Jean-Paul', 'Жан-Поль', 'Sartre', 'Sartre', 'Sartre', 'Sartre', 'Sartre', 'Сартр', 'Sartre', 'Сартр', '".date('Y-m-d H:i:s')."'),
('Se Bo', 'Se Bo', 'Se Bo', 'Se Bo', 'Se Bo', 'Се Бо', 'Se Bo', 'Се Бо', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '".date('Y-m-d H:i:s')."'),
('Oksana', 'Oksana', 'Oksana', 'Oksana', 'Oksana', 'Оксана', 'Oksana', 'Оксана', 'Jossypenko', 'Yosypenko', 'Yosypenko', 'Josypenko', 'Josypenko', 'Йосипенко', 'Josypenko', 'Йосипенко', '".date('Y-m-d H:i:s')."');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_authors'.<br>");
} else {
	printf("Not inserted into table 'content_authors'.<br>");
}

// Insert into table `content_new`
$query = "INSERT INTO `content_new` 
(`content_new_de`,
 `content_new_en`,
 `content_new_fr`,
 `content_new_it`,
 `content_new_pl`,
 `content_new_ru`,
 `content_new_sp`,
 `content_new_ua`) VALUES
('Sprache', 'Language', 'Langue', 'Lingua', 'Język', 'Язык', 'Lengua', 'Мова'),
('Richtung', 'Direction', 'Direction', 'Direzione', 'Kierunek', 'Направление', 'Dirección', 'Напрямок'),
('Status', 'Status', 'Statut', 'Status', 'Kierunek', 'Статус', 'Estatus', 'Статус'),
('Jahr', 'Year', 'Année', 'Anno', 'Rok', 'Год', 'Año', 'Рік'),
('Autoren', 'Authors', 'Auteurs', 'Autori', 'Autorzy', 'Авторы', 'Autores', 'Автори'),
('Name', 'Title', 'Nom', 'Nome', 'Nazwa', 'Название', 'Nombre', 'Назва'),
('Zusammenfassung', 'Annotation', 'Abstrait', 'Astratto', 'Adnotacja', 'Аннотация', 'Abstracto', 'Анотація'),
('Bibliographie', 'Bibliography', 'Bibliographie', 'Bibliografia', 'Bibliografia', 'Библиография', 'Bibliografía', 'Бібліографія'),
('Beschreibung', 'Description', 'Description', 'Descrizione', 'Opis', 'Описание', 'Descripción', 'Опис'),
('Stichworte', 'Keywords', 'Mots-clés', 'Parole chiave', 'Kluczowe słowa', 'Ключевые слова', 'Palabras clave', 'Ключові слова'),
('Bild', 'Image', 'Image', 'Immagine', 'Obraz', 'Образ', 'Imagen', 'Образ'),
('Datentypen', 'Types of data', 'Types de données', 'Tipi di dati', 'Rodzaje danych', 'Типы данных', 'Tipos de datos', 'Типи даних'), 
('Kategorieen', 'Categories', 'Catégories', 'Categorie', 'Kategorie', 'Категории', 'Categoría', 'Категорії'), 
('Content', 'Content', 'Content', 'Contenuto', 'Zawartość', 'Контент', 'Contenido', 'Контент'), 
('Stornieren', 'Cancel', 'Annuler', 'Annulla', 'Skasować', 'Отменить', 'Cancelar', 'Скасувати'), 
('Zurück', 'Back', 'Arrière', 'Indietro', 'Wrócić', 'Вернуть', 'Espalda', 'Вернути'), 
('Nächster', 'Next', 'Prochain', 'Prossimo', 'Dalej', 'Дальше', 'Siguiente', 'Далі'), 
('Sparen', 'Save', 'Sauvegarder', 'Salvare', 'Zapisać', 'Записать', 'Salvar', 'Записати'), 
('Wählen', 'Choose', 'Choisir', 'Scégliere', 'Wybrać', 'Выбрать', 'Elegir', 'Вибрати'), 
('Name', 'Name', 'Nom', 'Nóme', 'Imię', 'Имя', 'Nombre', 'Ім\'я'), 
('Familienname', 'Surname', 'Nom de famille', 'Cognome', 'Nazwisko', 'Фамилия', 'Apellido', 'Прізвище');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_new'.<br>");
} else {
	printf("Not inserted into table 'content_new'.<br>");
}

// INSERT CONTENT DATA ------------------------------------

// Insert into table `contents`
$query = "INSERT INTO `contents` 
(`content_img`,
 `content_author`,
 `content_title`,
 `content_year`,
 `content_annotation`,
 `content_bibliography`,
 `content_url`,
 `content_language`,
 `content_description`,
 `content_keywords`,
 `content_reg_date`) VALUES
('../img/bondarenko_vozvraschenie_ontologii_k_opytu_bytia.jpg', 'Сергей Бондаренко', 'Возвращение онтологии к человеческому опыту личного бытия', '2009', 'Исследование проблемы несоответствия современной онтологии человеческому опыту личного повседневного бытия. Как решение предлагается онтологическая конструкция \"субъект – бытие – другой субъект\".', 'Наука 2009: зб. праць за матеріалами звітної наук.-практ. конф., 28-29 квіт. 2009 р. / М-во освіти і науки України / наук. ред. О.М.Холод. – Кривий Ріг: РВВ ПНЗ \"ІДА\", 2009. – 180 с.: іл., табл. – Текст: укр., рос., англ. – Бібліогр. в кінці ст.', 'bondarenko_vozvraschenie_ontologii_k_opytu_bytia_ru', 'ru', 'Исследование проблемы несоответствия современной онтологии человеческому опыту личного повседневного бытия. Как решение предлагается онтологическая конструкция \"субъект – бытие – другой субъект\".', 'философия, онтология, человеческий опыт, личное бытие, повседневность, бытие, мир', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_kritika_nasilia_v_sovremennoj_ontologii.jpg', 'Сергей Бондаренко', 'Критика традиции насилия в современной онтологии', '2009', 'Исследование проблемы положения в основу современной онтологии концепции насилия. Как решение проблемы предлагается ограничение использования в онтологии понятий \"противоречивое\", \"отрицательное\", \"абсолютное\", \"объективное\", \"бесконечное\".', 'Вісник Міжнародного дослідницького центру: \"Людина: мова, культура, пізнання\": Щокварт. науков. журнал. – [гол. ред. О.М.Холод] – 2009. – Том 22 (3). – 163 с.', 'bondarenko_kritika_nasilia_v_sovremennoj_ontologii_ru', 'ru', 'Исследование проблемы присутствия концепции насилия в современной онтологии как неотъемлемого элемента . Как решение предлагается отказ от использования \"субъект – бытие – другой субъект\".', 'философия, онтология, бытие, насилие, преступление, генезис преступления, субъект насилия, объект насилия, воля субъекта, противодействие, противоречие, противопоставление, противоположность, отрицание, абсолютное, абсолютизация, объективное, объективация, бесконечное, бесконечность, всеобъемлющее, вечное, несотворимое, неуничтожимое, неопределенное, безграничное', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_solipsicheskaja_kauzo-model_prestuplenija.jpg', 'Сергей Бондаренко', 'Солипсическая каузо-модель преступления', '2013', 'Исследование проблемы отсутствия в философии и психологии преступления единой общей мотивационной модели преступления. Как решение предлагается солипсическая каузо-модель преступления, в которой мотивационным ядром преступления являются онтологические представления человека о себе и мире.', 'Наука - 2013: стан і перспективи; збірник матеріалів науково-практичної конференції (25 квітня 2013 року) / Редкол.: Богатирьова Г А. (гол. ред.) та ін. - Кривий Ріг: КФ ДДУВС, друкарня «Конон», 2013. - 336 с.', 'bondarenko_solipsicheskaja_kauzo-model_prestuplenija_ru', 'ru', 'Исследование проблемы отсутствия в философии и психологии преступления единой общей мотивационной модели преступления. Как решение предлагается солипсическая каузо-модель преступления, в которой мотивационным ядром преступления являются онтологические представления человека о себе и мире.', 'преступление, каузо-модель преступления, мотив преступления, мотивационная модель, поведение преступника, преступное поведение, солипсизм, онтология, бытие', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_kategoria_deneg_i_obmena_v_postindustrialnoj_ekonomike.jpg', 'Сергей Бондаренко', 'Категория денег и обмена в контексте постиндустриальной экономики', '2013', 'Исследование проблемы несоответствия материалистических представлений о категориях денег и обмена потребностям постиндустриальной экономики. Как решение предлагается рассмотрение денег как математических понятий, нематериальных и неотчуждаемых при обмене.', 'Сучасні проблеми та перспективи розвитку економіки України: Збірник тез доповідей науково-практичної конференції молодих науковців, здобувачів, аспірантів і студентів (м.Кривий Ріг, 03-04 квітня 2013 р.) / від.ред.О.М.Брадул – Вип.1. – Кривий Ріг: 2013. – 66 с.', 'bondarenko_kategoria_deneg_i_obmena_v_postindustrialnoj_ekonomike_ru', 'ru', 'Исследование проблемы несоответствия материалистических представлений о категориях денег и обмена потребностям постиндустриальной экономики. Как решение предлагается рассмотрение денег как математических понятий, нематериальных и неотчуждаемых при обмене.', 'экономика, постиндустриальная экономика, экономическая наука, философия экономики, деньги, категория денег, природа денег, свойства денег, математические деньги, обмен, товар, отчуждение', '".date('Y-m-d H:i:s')."'),
('../img/liga_igrokov_butylka_piva.jpg', 'Сергей Бондаренко', 'Тренинг \"Лига игроков\". Пример первый \"Бутылка пива\"', '2007', 'Жертва идет по многолюдной улице, смотрит по сторонам. Засмотревшись, с кем-то сталкивается. Слышен звук бьющейся бутылки. Игрок явно сильнее Жертвы. Драться бессмысленно и бежать невозможно. Игрок с нарастающим недовольством задает Жертве вопрос: \"Ну и кто мне возместит убыток?\"', 'Тренинг \"Лига игроков\" Криворожской общественной организации \"СистемаТерминов\" в 2007 г.', 'bondarenko_psychologyc_liga_igrokov_1_ru', 'ru', 'Тренинг по выработке навыка практического применения знаний психологии, конфликтологии и логики в ситуации уличного конфликта об ущербе', 'практическая психология, конфликт, конфликтология, логика, тренинг', '".date('Y-m-d H:i:s')."'),
('../img/liga_igrokov_klassny_bunt.jpg', 'Сергей Бондаренко', 'Тренинг \"Лига игроков\". Пример второй \"Классный бунт\"', '2007', 'Игрок (ученик старших классов) затевает во время дискуссии (урока) галдеж. Жертва (учитель) делает Игроку несколько раз замечания, после чего требует покинуть совместную территорию (выйти из класса). Игрок игнорирует требование Жертвы. Жертва решает выдворить Игрока с территории силой, подходит к Игроку и пытается схватить его за шиворот.', 'Тренинг \"Лига игроков\" Криворожской общественной организации \"СистемаТерминов\" в 2007 г.', 'bondarenko_psychologyc_liga_igrokov_2_ru', 'ru', 'Тренинг по выработке навыка практического применения знаний психологии, конфликтологии и логики в ситуации конфликта \"учитель - ученик\".', 'практическая психология, конфликт, конфликтология, логика, тренинг', '".date('Y-m-d H:i:s')."'),
('../img/liga_igrokov_opustitj_loha.jpg', 'Сергей Бондаренко', 'Тренинг \"Лига игроков\". Пример третий \"Опустить лоха\"', '2007', 'Не важно, какой пол у Игрока и его Жертвы. Не важно, произошло это с глазу на глаз или в присутствии свидетелей, которые разнесут слух о случившемся всем и вся. Игрок обратился к Жертве, и создал ситуацию: \"Х*й пососешь?\"', 'Тренинг \"Лига игроков\" Криворожской общественной организации \"СистемаТерминов\" в 2007 г.', 'bondarenko_psychologyc_liga_igrokov_3_ru', 'ru ', 'Тренинг по выработке навыка практического применения знаний психологии, конфликтологии и логики в ситуации сексуальной провокации', 'практическая психология, конфликт, конфликтология, логика, тренинг', '".date('Y-m-d H:i:s')."'),
('../img/liga_igrokov_gop_stop.jpg', 'Сергей Бондаренко', 'Тренинг \"Лига игроков\". Пример четвертый \"Гоп-стоп\"', '2007', 'Малолюдное место. Драться бессмысленно. Бежать невозможно. Игрок подходит к Жертве и спрашивает: \"Слышь, парень, у тебя есть мобила?\"', 'Тренинг \"Лига игроков\" Криворожской общественной организации \"СистемаТерминов\" в 2007 г.', 'bondarenko_psychologyc_liga_igrokov_4_ru', 'ru', 'Тренинг по выработке навыка практического применения знаний психологии, конфликтологии и логики в ситуации уличного конфликта', 'практическая психология, конфликт, конфликтология, логика, тренинг', '".date('Y-m-d H:i:s')."'),
('../img/sebo_coheirs.jpg', 'Сергей Бондаренко', 'Сонаследники', '2016', 'Роман о сексуальной революции в христианстве начала 21-го века – переосмыслении природы человека и перестройке отношений человека с Богом, самим собой и миром', 'Первые главы \"Сонаследники\" в 2017 г.', 'sebo_sonasledniki_ru', 'ru', 'Роман о сексуальной революции в христианстве начала 20-го века – переосмыслении природы человека и перестройке отношений человека с Богом и человеком с миром', 'христианство, человек, природа человека, вера, религия', '".date('Y-m-d H:i:s')."'),
('../img/martin_heidegger_sein_und_zein.jpg', 'Мартин Хайдеггер', 'Бытие и время', '1997', '\"Бытие и время\" является главным произведением выдающегося немецкого философа Мартина Хайдеггера (1889—1976). Эта работа оказала решающее влияние на развитие европейской философской традиции и западного гуманизма в ХХ веке.', 'Хайдеггер М. Бытие и время / М. Хайдеггер; Пер. с нем. В.В. Бибихина; Под ред. В.Айрапетян. - М.: Изд-во \"Ad Marginem\", 1997. - 461 с.', 'martin_heidegger_sein_und_zein_ru', 'ru', 'Хайдеггер М. Бытие и времяя / М. Хайдеггер; Пер. с нем. В.В. Бибихина; Под ред. В.Айрапетян. - М.: Изд-во \"Ad Marginem\", Москва, 1997. - 461 с.', 'философия, онтология, бытие', '".date('Y-m-d H:i:s')."'),
('../img/martin_heidegger_parmenid.jpg', 'Мартин Хайдеггер', 'Парменид', '2009', 'Книга \"Парменид\".  Содержащиеся в этом томе лекции были прочитаны Хайдеггером в зимнем семестре 1942/43 гг. в университете Фрайбурга (Брайсгау). Темой их стала \"богиня Истина\" (Алетейя), с которой взгляд человека сталкивается в знаменитом фрагменте дидактической поэмы Парменида \"О природе\".', 'Хайдеггер М. Парменид / Перевод с немецкого А.П.Шурбелева. - СПб.: Владимир Даль, 2009 г. - 382 стр.', 'martin_heidegger_parmenid_ru', 'ru', 'Хайдеггер М. Парменид / Перевод с немецкого А.П.Шурбелева. - СПб.: Владимир Даль, 2009 г. - 382 стр.', 'философия, онтология, епистемология, истина', '".date('Y-m-d H:i:s')."'),
('../img/martin_heidegger_osnovnye_problemy_phenomenologii.jpg', 'Мартин Хайдеггер', 'Основные проблемы феноменологии ', '2001', 'Марбургские лекции Мартина Хайдеггера \"Основные проблемы феноменологии\" (1927 г.) представляют собой, по словам автора, новую разработку третьего раздела первой части \"Бытия и времени\".', 'Хайдеггер М. Основные проблемы феноменологии / Перевод с немецкого А. Г. Чернякова. - СПб.: Высшая религиозно философская школа, 2001 г. - 445 стр.', 'martin_heidegger_osnovnye_problemy_phenomenologii_ru', 'ru', 'Хайдеггер М. Основные проблемы феноменологии / Перевод с немецкого А. Г. Чернякова. - СПб.: Высшая религиозно философская школа, 2001 г. - 445 стр.', 'философия, онтология, бытие', '".date('Y-m-d H:i:s')."'),
('../img/martin_heidegger_fenomenologicheskie_interpretacji_aristotela.jpg', 'Мартин Хайдеггер', 'Феноменологические интерпретации Аристотеля (Экспозиция герменевтической ситуации)', '2012', 'Хайдеггеровская \"потерянная рукопись\" на пути к \"Бытию и времени\".', 'Хайдеггер М. Феноменологические интерпретации Аристотеля (Экспозиция герменевтической ситуации) / Пер. с нем., предисл., науч. ред., сост. слов. Н. А. Артеменко. - СПб.: ИЦ \"Гуманитарная Академия\", 2012. - 224 с.', 'martin_heidegger_fenomenologicheskie_interpretacji_aristotela_ru', 'ru', 'Хайдеггер М. Феноменологические интерпретации Аристотеля (Экспозиция герменевтической ситуации) / Пер. с нем., предисл., науч. ред., сост. слов. Н. А. Артеменко. - СПб.: ИЦ \"Гуманитарная Академия\", 2012. - 224 с.', 'философия, онтология, бытие', '".date('Y-m-d H:i:s')."'),
('../img/jan_pol_sartr_bytie_i_nichto.jpg', 'Жан-Поль Сартр', 'Бытие и ничто: Опыт феноменологической онтологии', '2000', '\"Бытие и ничто\" - главный философский труд французского писателя и мыслителя-экзистенциалисга Ж. П. Сартра (1905—1980). Он заставил по-новому взглянуть на такие традиционные для философии вопросы, как суть человеческого бытия, особенности сознания и действия человека, его отношение к миру вещей и других людей, смысл и корни его свободы и ответственности. ', 'Сартр Ж. П. Бытие и ничто: Опыт феноменологической онтологии / Пер. с фр., предисл., примеч. В. И. Колядко. — М.: Республика, 2000. — 639 с. — (Мыслители XX века).', 'jan_pol_sartr_bytie_i_nichto_ru', 'ru', 'Сартр Ж. П. Бытие и ничто: Опыт феноменологической онтологии / Пер. с фр., предисл., примеч. В. И. Колядко. — М.: Республика, 2000. — 639 с. — (Мыслители XX века).', 'философия, феноменология, психология, воображение', '".date('Y-m-d H:i:s')."'),
('../img/jan_pol_sartr_voobrazhaemoe.jpg', 'Жан-Поль Сартр', 'Воображаемое. Феноменологическая психология фосприятия', '2001', '\"Воображаемое…\" - книга по философии психологии, которая в большей степени посвящена философии, чем психологии. В ней Сартр поставил перед собой задачу создать феноменологическую теорию воображения.', 'Сартр Ж. П. Воображаемое. Феноменологическая психология фосприяти. - СПб.: Наука, 2001. - 319 с. - (Сер. \"Французская библиотека\").', 'jan_pol_sartr_voobrazhaemoe_ru', 'ru', 'Сартр Ж. П. Воображаемое. Феноменологическая психология фосприяти. - СПб.: Наука, 2001. - 319 с. - (Сер. \"Французская библиотека\").', 'философия, онтология, бытие', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_dopomihnyj_pravovyj_mehanizm_vprovadzenia_it_system_ua.jpg', 'Сергій Бондаренко', 'Допоміжний правовий механізм впровадження ІТ-систем', '2016', 'Дослідження компетенцій інституту Уповноваженого з прав людини при Верховній Раді України як допоміжного правового механізму впровадження ІТ-систем на державному рівні', 'Уривок з \"Технология реформирования законодательства\" - Кр.Рог: ГО \"Система Термітів\", 2005.', 'bondarenko_dopomihnyj_pravovyj_mehanizm_vprovadzenia_it_system_ua', 'ua', 'Дослідження компетенцій інституту Уповноваженого з прав людини при ВРУ як допоміжного правового механізму впровадження ІТ-систем на державному рівні', 'civil society, e-democracy, e-progres, e-vox, igov, Уповноважений з прав людини, народовладдя', '".date('Y-m-d H:i:s')."'),
('../img/philosophical_club.jpg', 'Се Бо', 'Собрание философского клуба в Варшаве', '2017', 'Собрание участников постсолипсического философского клуба в Варшаве', 'Протоколы философского клуба, 2017.', 'event_book_meeting_of_philosophical_club_in_warshaw_ru', 'ru', 'Встреча философского клуба в Варшаве', 'философия, философский клуб, Варшава, мероприятия', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_kategoria_groshej_ta_obminu_v_postindustrialnij_ekonomici.jpg', 'Сергій Бондаренко', 'Категорія грошей та обміну у контексті постиндустриальної экономіки', '2013', 'Дослідження проблеми невідповідності матеріалістичних уявлень про категорії грошей і обміну потребам постіндустріальної економіки. Як рішення пропонується розуміння грошей як математичних понять, нематеріальних і невідчужуваних при обміні.', 'Сучасні проблеми та перспективи розвитку економіки України: Збірник тез доповідей науково-практичної конференції молодих науковців, здобувачів, аспірантів і студентів (м.Кривий Ріг, 03-04 квітня 2013 р.) / від.ред.О.М.Брадул – Вип.1. – Кривий Ріг: 2013. – 66 с.', 'bondarenko_kategoria_groshej_ta_obminu_v_postindustrialnij_ekonomici_ua', 'ua', 'Дослідження проблеми невідповідності матеріалістичних уявлень про категорії грошей і обміну потребам постіндустріальної економіки. Як рішення пропонується розуміння грошей як математичних понять, нематеріальних і невідчужуваних при обміні.', 'економіка, постиндустриальна економіка, економічна наука, філософія економіки, гроші, категория грошей, природа грошей, властивості грошей, математичні гроші, обмен, товар, відчудження', '".date('Y-m-d H:i:s')."'),
('../img/sebo_coheirs_3.jpg', 'Сергей Бондаренко', 'Сбор средств на завершение романа \"Сонаследники\"', '2016', 'Для завершения и подготовки к публикации романа необходимо собрать средства на 6 меяцев работы - 3800 долларов', '', 'sebo_sonasledniki_crowdfunding_ru', 'ru', 'Роман о сексуальной революции в христианстве начала 20-го века – переосмыслении природы человека и перестройке отношений человека с Богом и человеком с миром', 'христианство, человек, природа человека, вера, религия', '".date('Y-m-d H:i:s')."'),
('../img/oxana_yosypenko_the_other_against_the_same_postmodern_interpretation_and_historico_philosophical_commentation.jpg', 'Оксана Йосипенко', '\"Той самий\" проти \"Іншого\": постмодерністська інтерпретація й історико-філософський коментар', '2016', 'Історико-філософський аналіз інтерпретаційних практик французьких філософів-постмодерністів здійснений автором шляхом контекстуалізації цих практик (1) в інтелектуальних дебатах і (2) соціально-інституційних умовах продукування філософського знання у Франції 1960-1970-х років.', '<a target=\"_blank\" href=\"https://sententiae.vntu.edu.ua/index/sententiae/article/view/278\">Sententiae, 2016, № 1 (XXXIV)</a>', 'oxana_yosypenko_the_other_against_the_same_postmodern_interpretation_and_historico_philosophical_commentation_ua', 'ua', 'Історико-філософський аналіз інтерпретаційних практик французьких філософів-постмодерністів 1960-1970-х років.', 'постмодерн, інтерпретація, критерії інтерпретації, легітимність інтерпретації, історико-філософський канон, довільність інтерпретації, множинність значення, філософсько-літературний тип дискурсу', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_povernennia_ontologii_do_dosvidu_buttia.jpg', 'Сергій Бондаренко', 'Повернення онтології до людського досвіду особистого буття', '2009', 'Дослідження проблеми несоответствия сучасної онтології людському досвіду особистого повсякденного буття. Як рішення пропонується онтологічна конструкція \"суб\'єкт – буття – інший суб\'єкт\".', 'Наука 2009: зб. праць за матеріалами звітної наук.-практ. конф., 28-29 квіт. 2009 р. / М-во освіти і науки України / наук. ред. О.М.Холод. – Кривий Ріг: РВВ ПНЗ \"ІДА\", 2009. – 180 с.: іл., табл. – Текст: укр., рос., англ. – Бібліогр. в кінці ст.', 'bondarenko_povernennia_ontologii_do_dosvidu_buttia_ua', 'ua', 'Дослідження проблеми несоответствия сучасної онтології людському досвіду особистого повсякденного буття. Як рішення пропонується онтологічна конструкція \"суб\'єкт – буття – інший суб\'єкт\".', 'філософія, онтологія, людський досвід, особисте буття, повсякденність, буття, світ', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_krytyka_nasillia_v_suchasnij_ontologii.jpg', 'Сергій Бондаренко', 'Критика традиції насилля в сучасній онтології', '2009', 'Дослідження проблеми покладення в основу сучасної онтології концепції насилля. Як рішення пропонується обмеження використання в онтології понять \"протирічне\", \"заперечне\", \"абсолютне\", \"об\'єктивне\", \"нескінченне\".', 'Вісник Міжнародного дослідницького центру: \"Людина: мова, культура, пізнання\": Щокварт. науков. журнал. – [гол. ред. О.М.Холод] – 2009. – Том 22 (3). – 163 с.', 'bondarenko_krytyka_nasillia_v_suchasnij_ontologii_ua', 'ua', 'Дослідження проблеми покладення в основу сучасної онтології концепції насилля. Як рішення пропонується обмеження використання в онтології понять \"протирічне\", \"заперечне\", \"абсолютне\", \"об\'єктивне\", \"нескінченне\".', 'філософія, онтологія, буття, насилля, злочин, генеза злочину, суб\'єкт насилля, об\'єкт насилля, воля суб\'єкта, протидія, протиріччя, протиставлення, протилежність, заперечення, абсолютне, абсолютизація, об\'єктивне, об\'єктивація, нескінченне, нескінченність, всеохоплююче, вічне, нествориме, незнищуванне, невизначене, безбежне', '".date('Y-m-d H:i:s')."'),
('../img/bondarenko_solipsychna_kauzo-model_zlochynu.jpg', 'Сергій Бондаренко', 'Солипсична каузо-модель злочину', '2013', 'Дослідження проблеми відсутності в філософії і психології злочину єдиної загальної мотиваційної моделі злочину. Як рішення пропонується соліпсична каузо-модель злочину, в якій мотиваційним ядром злочину є онтологичні уявлення людини про себе і світ.', 'Наука - 2013: стан і перспективи; збірник матеріалів науково-практичної конференції (25 квітня 2013 року) / Редкол.: Богатирьова Г А. (гол. ред.) та ін. - Кривий Ріг: КФ ДДУВС, друкарня «Конон», 2013. - 336 с.', 'bondarenko_solipsychna_kauzo-model_zlochynu_ua', 'ua', 'Дослідження проблеми відсутності в філософії і психології злочину єдиної загальної мотиваційної моделі злочину. Як рішення пропонується соліпсична каузо-модель злочину, в якій мотиваційним ядром злочину є онтологичні уявлення людини про себе і світ.', 'злочин, каузо-модель злочину, мотив злочину, мотиваційна модель, поведінка злочинця, злочинна поведінка, соліпсизм, онтологія, буття', '".date('Y-m-d H:i:s')."');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'contents'.<br>");
} else {
	printf("Not inserted into table 'contents'.<br>");
}

// Insert into table `content_relations_direction`
$query = "INSERT INTO `content_relations_direction` (`direction_id`, `content_id`) VALUES
('1', '1'),
('1', '2'),
('1', '3'),
('3', '3'),
('1', '4'),
('5', '4'),
('7', '5'),
('7', '6'),
('7', '7'),
('7', '8'),
('8', '9'),
('1', '10'),
('1', '11'),
('1', '12'),
('1', '13'),
('1', '14'),
('1', '15'),
('3', '16'),
('1', '17'),
('1', '18'),
('5', '18'),
('8', '19'),
('1', '20'),
('1', '21'),
('1', '22'),
('1', '23');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_relations_direction'.<br>");
} else {
	printf("Not inserted into table 'content_relations_direction'.<br>");
}

// Insert into table `content_relations_status`
$query = "INSERT INTO `content_relations_status` (`content_status_id`, `content_id`) VALUES
('3', '1'),
('3', '2'),
('3', '3'),
('3', '4'),
('3', '5'),
('3', '6'),
('3', '7'),
('3', '8'),
('2', '9'),
('4', '10'),
('4', '11'),
('4', '12'),
('4', '13'),
('4', '14'),
('4', '15'),
('3', '16'),
('1', '17'),
('3', '18'),
('1', '19'),
('4', '20'),
('3', '21'),
('3', '22'),
('3', '23');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_relations_status'.<br>");
} else {
	printf("Not inserted into table 'content_relations_status'.<br>");
}

// Insert into table `content_relations_category`
$query = "INSERT INTO `content_relations_category` (`content_category_id`, `content_id`) VALUES
('2', '1'),
('2', '2'),
('2', '3'),
('43', '3'),
('2', '4'),
('54', '4'),
('55', '5'),
('55', '6'),
('55', '7'),
('55', '8'),
('57', '9'),
('2', '10'),
('2', '11'),
('2', '12'),
('2', '13'),
('2', '14'),
('2', '15'),
('3', '15'),
('41', '16'),
('28', '16'),
('1', '17'),
('2', '18'),
('54', '18'),
('57', '19'),
('2', '20'),
('3', '20'),
('2', '21'),
('2', '22'),
('2', '23'),
('43', '23');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_relations_category'.<br>");
} else {
	printf("Not inserted into table 'content_relations_category'.<br>");
}

// Insert into table `content_relations_author`
$query = "INSERT INTO `content_relations_author` (`content_author_id`, `content_id`) VALUES
('1', '1'),
('1', '2'),
('1', '3'),
('1', '4'),
('1', '5'),
('1', '6'),
('1', '7'),
('1', '8'),
('4', '9'),
('2', '10'),
('2', '11'),
('2', '12'),
('2', '13'),
('3', '14'),
('3', '15'),
('1', '16'),
('1', '18'),
('5', '20'),
('1', '21'),
('1', '22'),
('1', '23');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_relations_author'.<br>");
} else {
	printf("Not inserted into table 'content_relations_author'.<br>");
}

// Insert into table `content_relations_type`
$query = "INSERT INTO `content_relations_type` (`content_type_id`, `content_id`) VALUES
('4', '1'),
('4', '2'),
('5', '3'),
('5', '4'),
('6', '5'),
('6', '6'),
('6', '7'),
('6', '8'),
('3', '9'),
('3', '10'),
('3', '11'),
('3', '12'),
('3', '13'),
('3', '14'),
('3', '15'),
('4', '16'),
('5', '18'),
('4', '20'),
('4', '21'),
('4', '22'),
('5', '23');";
if (mysqli_query($db, $query) === TRUE) {
    printf("Inserted into table 'content_relations_type'.<br>");
} else {
	printf("Not inserted into table 'content_relations_type'.<br>");
}

?>
