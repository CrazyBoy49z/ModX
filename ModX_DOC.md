# Терминология

**Шаблон** – содержит общую верстку страницы со структурой и дизайном.
Также в нем определяются места для вывода динамического содержимого. Для каждого документа можно выбрать свой шаблон.

**Параметры (TV)** – дополнительные параметры, которые подключаются к шаблону.
Параметры могут быть разных типов (текст, ссылка, файл, дата, число и т.д.). Более подробно о типах ждите в следующих статьях.

**Чанк** – маленький шаблон, который может использоваться как просто для вывода какого-то содержимого (телефона на всех страницах),
так и для обработки (шаблон отправляемого письма FormIt, шаблон каталога выводимого pdoPage и т.д.).
Таким образом, вид (представление) информации отделяется от места обработки и легко управляется.

**Сниппет** – код для обработки информации. Анализируют полученную информацию (например, сообщение пользователя)
и предоставляют результат (например, отправляют сообщение по почте, а пользователю показывают сообщение о результате).
Сниппеты формируют меню (pdoMenu), выводят списки статей с разбиением на страницы (pdoPage), строят формы (FormIt).
Для вывода используют Чанки.

**Плагин** – код, который запускается при наступлении какого-то события.
Например, подсвечивает искомые слова (Search Highlighting) при переходе со страницы поиска.
Событий много и их рассмотрение стоит отдельной статьи

## Специальные теги

Для вывода динамических данных используются специальные теги.

### Системные

__[[++site_name]]__ – название сайта  
__[[++base_url]]__ или __[[++site_url]]__ – адрес сайта (http://modx.ru)  
__[[++modx_charset]]__ – используемая кодировка  
__[[++cultureKey]]__ - текущий ключ язика  
**[^qt^]** – время на запросы к базе данных  
**[^q^]** – запросов к базе данных  
**[^p^]** – время на работу PHP скриптов  
**[^t^]** – общее время на генерацию страницы  
**[^s^]** – источник содержимого (база или кэш)  

### Стандартные

__[[*pagetitle]]__ – заголовок документа  
__[[*longtitle]]__ – расширенный заголовок документа  
__[[*description]]__ – описание документа  
__[[*introtext]]__ – аннотация документа  
__[[*content]]__ – содержимое документа  
__[[*alias]]__ – псевдоним документа  
__[[*id]]__ – идентификатор (номер) документа  
__[[*pub_date]]__ – дата публикации дкоумента  
__[[*unpub_date]]__ – дата завершения публикации  
__[[*createdby]]__ – Идентификатор пользователя создавшего документ  
__[[*createdon]]__ – Дата создания документа  
__[[*editedby]]__ – Идентификатор пользователя редактировавшего документ  
__[[*editedon]]__ – Дата редактирования документа  
__[[~идентификатор]]__ – URL указанного документа  

### Дополнительные

__[[*type]]__ – вариант (документ, папка или ссылка)  
__[[*contentType]]__ – тип содержимого (например, text/html)  
__[[*published]]__ – опубликован ли документ (1|0)  
__[[*parent]]__ – номер (ID) родительского документа  
__[[*isfolder]]__ – является ли документа папкой (1|0)  
__[[*richtext]]__ – используется ли при редактировании документа визуальный редактор  
__[[*template]]__ – номер (ID) используемого шаблона для документа  
__[[*menuindex]]__ – порядковый номер отображения в меню  
__[[*cacheable]]__ – Кэшируется ли документ (1|0)  
__[[*deleted]]__ – Документ удален (1|0)  
__[[*deletedby]]__ – Идентификатор пользователя удалившего документ  
__[[*menutitle]]__ – Заголовок меню. Если не используется, то заголовок документа  
__[[*donthit]]__ – Слежение за количеством посещений отключено (1|0)  
__[[*haskeywords]]__ – Документ содержит ключевые слова (1|0)  
__[[*hasmetatags]]__ – Документ имеет метатеги (1|0)  
__[[*privateweb]]__ – Документ входит в частную группу пользовательских документов (1|0)  
__[[*privatemgr]]__ – Документ входит в частную группу менеджерских документов (1|0)  
__[[*content_dispo]]__ – Вариант выдачи содержимого (1 — для отображения | 0 — для скачивания)  
__[[*hidemenu]]__ – Документ не отображается в меню (1|0)  

### Параметры TV, сниппеты и чанки

__[[*НазваниеПараметраTV]]__ – выводит значение параметра в документе.  
__[[$НазваниеЧанка]]__ – возвращает содержимое чанка.  
__[[НазваниеСниппета]]__ – возвращает результат работы сниппета. Также можно передавать сниппету дополнительные параметры,
перечисляя их при вызове — __[[НазваниеСниппета? &параметр1=`значение1` &параметр2=`значение2` &параметрN=`значениеN`]]__  
__[[+НазваниеПеременной]]__ – встречается в чанках, которые используются для обработки (Ditto, eForm и т.д.).
После обработки вместо них вставляются значения. Таким образом, это тоже вроде мини-языка, но для сниппетов.  

### Нюансы

1) На самом деле есть два варианта вызова сниппета:  
__[[НазваниеСниппета]]__ – кэшируемый вызов сниппета  
__[[! НазваниеСниппета!]]__ – некэшируемый вызов сниппета  

2) При использовании дополнительных параметров в сниппете нужно убедиться, что запись не разбивается переносом строки.
Если это так, то сниппет откажется работать.  

Где использовать  
Все очень гармонично используется друг с другом.  
В шаблонах можно использовать параметры TV, сниппеты и чанки.  
В чанках можно вызывать сниппеты, параметры TV и другие чанки.  
В сниппетах можно вызывать вообще все, но через PHP.  
В конечном счете вам вернется итоговый результат обработки всех сниппетов/чанков/параметровTV.  


System Setting:     __[[++SettingName]]__  
TV/current fields name:             __[[*fieldName/TvName]]__  
Link tag:       __[[~PageId? &paramName=`value`]]__
Placeholder:        __[[+PlaceholderName]]__  

Вывод только папок с первой вложеностю  

```
[[pdoMenu?
&parents=`0`
&level=`1`
&where=`{"isfolder":"1"}`
]]
```
## GLOBALS AND SETTINGS  
#### always available objects
```
$modx->resource; // Текущий ресурс
$modx->user;     // Текущий пользователь
```
#### get a system setting
```
$modx->getOption('SettingName'); // eg site_start
```

## LOGGING 
#### log an error
```
$elementName = '[SnippetName]';
$modx->log(modX::LOG_LEVEL_ERROR, $elementName.' Could not do something.');
// also:  LOG_LEVEL_DEBUG, LOG_LEVEL_INFO, LOG_LEVEL_WARN
```
#### change target of logging 
```
$modx->setLogTarget('FILE'); // or ECHO
$target = array(
'target' => 'FILE',
'options' => array(
'filename' => 'path_to_file'),
);
$modx->log(xPDO::LOG_LEVEL_ERROR, 'Error Message', $target);
```

#### change error level
```
$modx->setDebug(E_ALL & ~E_NOTICE); // sets error_reporting to everything except NOTICE remarks
$modx->setLogLevel(modX::LOG_LEVEL_DEBUG);
```

#### To report errors to the MODx error log:
```
trigger_error('...', E_USER_ERROR);
```

## ЧАНКИ  

#### получить простой чанк 
```
$modx->getChunk('ChunkName');
```

#### parse a chunk many times
```
foreach ($docs as $doc) {
$output .= $modx->getChunk('teaserTpl', $doc->toArray() );
}
return $output;
```

## SNIPPETS

#### class boilerplate for creating a class for use in a snippet
#### provides access to $modx object by reference and snippet properties
```
class MyClass {
  function __construct($modx, $scriptProperties) {
    $this->modx =& $modx;
    $this->props =& $scriptProperties;
  }
  public function init() {
    $this->size = $this->props['size'];
    $this->color = $this->props['color'];
  }
}
```

## RESOURCES
```
$id = $modx->resource->get('id');
```
#### Display a particular document
```
$resource = $modx->getObject('modResource', array('pagetitle'=>'MyDocument')); // with properties
$resource = $modx->getObject('modResource', $resourceID); // with a document id
$output = '<p>Document:' . $resource->get('longtitle') . '</p>';
$output .= '<p>Content:' . $resource->get('content') . '</p>';
```
#### change a resource property 
```
$resource = $modx->getObject('modResource', $resourceID); // with a document id
$resource->set('template', 7);
$resource->save();
```
#### get all published resources that have not been deleted
```
$resources = $modx->getCollection('modResource',
array('published'=>'1','deleted'=>'0'));
foreach($resources as $resource) {
$output .= '<div class="resource"><p>Document:' . $resource->get('longtitle') . '</p>';
$output .= '<p>Content:' . $resource->get('content') . '</p></div>';
}
```
#### Get the parent object of the current resource
```
$parent = $modx->resource->getOne('Parent');
return $parent->get('pagetitle');
```
#### Get the child objects of the current resource 
```
$children = $modx->resource->getMany('Children');
foreach ($children as $child) {
$output .= '<p>' . $child->get('pagetitle') . '</p>';
}
```

## TVs


#### To set a TV value for the current resource */
```
$tv = $modx->getObject('modTemplateVar',array('name'=>'tvName')); // get the required TV object by name (or id)
$tv->setValue($modx->resource->get('id'), $newValue); // set the new value and save it
$tv->save();
```
#### to get a TV value for the current resource  

#### retrieve a number of TVs for resource  
```
$results = array();
$tvs = $modx->getCollection(
  'modTemplateVar',
  array("`name` IN (
  'image',
  'imageClass',
  'imageAlt',
  'imageCaption'
  )")
);

foreach ($tvs as $tv) {
  $results[$tv->get('name')] = (empty($processTVs) ? $tv->getValue($resourceId) : $tv->renderOutput($resourceId));
}
```
#### render to a chunk of goodness
```
return $modx->getChunk('Picture.tpl',$results);
```

#### get all tvs for another resource
```
$obj = $modx->getObject('modResource', array('name'=>'MyDoc'));
$id = $obj->get('id');
$tvs = $obj->getMany('TemplateVars');
foreach ($tvs as $tv) {
$rawValue = $tv->getValue($id);
$processedValue = $tv->renderOutput($id);
}
```
## USERS

#### Get all active users
```
$users = $modx->getCollection('modUser',
array('active'=>'1'));
foreach ($users as $user) {
$output .= '<p>Username: ' . $user->get('username') . '</p>';
}
return $output;
```

#### Get the user object for the creator of the current document
```
$user = $modx->resource->getOne('CreatedBy');
return $user->get('username');
```

#### Publish a set of resources from a list of resource IDs
```
$resourceIds = array('12, 23, 32, 45');
foreach ($resourceIds as $id) {
$resource = $modx->getObject('modResource',$id);
$resource->set('published', '1');
$resource->save();
}
```
## XPDO 

__getObject__  - get one object/table row  
__getCollection__ - get many objects/table rows  
__getOne__ - get one related object  
__getMany__ - get many related objects  
__getCollectionGraph__ - get many objects and their related  objects   

#### other xpdo object methods
```
$object->get('fieldName');
$object->toArray();
```

#### change the template of many documents with the same parent
```
foreach ($modx->getIterator('modResource', array('parent' =>15)) as $res) { $res->set('template',5); $res->save(); }
```

#### general xpdo query 
```
$sql = 'SELECT * FROM `'.$modx->getOption(xPDO::OPT_TABLE_PREFIX).'site_htmlsnippets`';
$result = $modx->query($sql);

if (!is_object($result)) {
return 'No result!';
}
else {
while ($row = $q_chunks->fetch(PDO::FETCH_ASSOC))
// do something: $row['name'];
}
}
```

## Классы объектов 

```
modResource
msProduct
msProductData
modSystemSetting
modContext
```

## MODX SERVICES - EMAIL  

#### send an email 

```
// first, get the email with the placeholders in it replaced by the snippet call.
// (Note the properties in the snippet call are in the array $scriptProperties.
// http://api.modx.com/revolution/2.1/_model_modx_mail_modmail.class.html
$message = $modx->getChunk('myEmail',$scriptProperties);
/* now load modMail, and setup options */
$modx->getService('mail', 'mail.modPHPMailer');
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,$scriptProperties['fromEmail']);
$modx->mail->set(modMail::MAIL_FROM_NAME,$scriptProperties['fromName']);
$modx->mail->set(modMail::MAIL_SENDER,$scriptProperties['fromName']);
$modx->mail->set(modMail::MAIL_SUBJECT,$scriptProperties['subject']);
$modx->mail->address('reply-to',$scriptProperties['fromEmail']);
$modx->mail->setHTML(true);
/* specify the recipient */
$modx->mail->address('to',$scriptProperties['toEmail']);
/* send! */
$modx->mail->send();
$modx->mail->reset();

/* get is Admin */
$modx->user->isMember('Administrator')
```

## Структура плагина
**_build/** - папка, в которой хранятся скрипты, необходимые для создания транспортного пакета:  
**_build/build.config.php** - конфигурация транспортного пакета;  
**_build/build.transport.php** - сборщик транспортного пакета;  
**_build/data/** - список сниппетов, чанков и других modElement, которые будут установлены;  
**_build/includes/functions.php** - вспомогательные функции для работы сборщика;   
___build/properties/properties.*.php__ - список свойств сниппета;  
___build/resolvers/__ - вспомогательные скрипты, запускающиеся на конечном сайте при установке пакета;  
__core/__ - файлы, которые нужны для внутренней логики расширения:  
__core/components/*/controllers/home.class.php__ - файл для подготовки страниц админки, который загружает
нужные скрипты и стили;  
__core/components/*/docs__ - история изменений, инструкция и лицензия;  
__core/components/*/elements/snippets/snippet.*.php__ - сниппет расширения;  
__core/components/*/elements/templates/home.tpl__ - шаблон админки расширения, в котором выводится список
заказов;  
__core/components/*/model/*/*.class.php__ - класс RBS;  
__core/components/*/model/schema/*.mysql.schema.xml__ - схема для xPDO;  
__core/components/*/processors/mgr/order/getlist.class/php__ - скрипт для вывода всех заказов в админке;  
__assets/__ - файлы, которые должны быть доступны снаружи, из интернета:  
__assets/components/*/js/mgr/widgets/home.panel.js__ - вывод админки расширения;  
__assets/components/*/js/mgr/widgets/orders.grid.js__ - вывод таблицы с заказами.  
