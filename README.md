## Description
PHP-IMAP is a wrapper for common IMAP communication without the need to have the php-imap module installed / enabled.
The protocol is completely integrated and therefore supports IMAP IDLE operation and the "new" oAuth authentication
process as well.
You can enable the `php-imap` module in order to handle edge cases, improve message decoding quality and is required if
you want to use legacy protocols such as pop3.

Official documentation: [php-imap.com](https://www.php-imap.com/)

Laravel wrapper: [webklex/laravel-imap](https://github.com/Webklex/laravel-imap)

Discord: [discord.gg/rd4cN9h6][link-discord]

## Table of Contents
- [Documentations](#documentations)
- [Compatibility](#compatibility)
- [Basic usage example](#basic-usage-example)
- [Sponsors](#sponsors)
- [Testing](#testing)
- [Known issues](#known-issues)
- [Support](#support)
- [Features & pull requests](#features--pull-requests)
- [Security](#security)
- [Credits](#credits)
- [License](#license)


## Documentations
- Legacy (< v2.0.0): [legacy documentation](https://github.com/Webklex/php-imap/tree/1.4.5)
- Core documentation: [php-imap.com](https://www.php-imap.com/)


## Compatibility
| Version | PHP 5.6 | PHP 7 | PHP 8 |
|:--------|:-------:|:-----:|:-----:|
| v5.x    |    /    |   /   |   X   |
| v4.x    |    /    |   X   |   X   |
| v3.x    |    /    |   X   |   /   |
| v2.x    |    X    |   X   |   /   |
| v1.x    |    X    |   /   |   /   |

## Basic usage example
This is a basic example, which will echo out all Mails within all imap folders
and will move every message into INBOX.read. Please be aware that this should not be
tested in real life and is only meant to give an impression on how things work.

```php
use Meow7\Phpimap\ClientManager;

require_once "vendor/autoload.php";

$cm = new ClientManager('path/to/config/imap.php');

/** @var \Webklex\PHPIMAP\Client $client */
$client = $cm->account('account_identifier');

//Connect to the IMAP Server
$client->connect();

//Get all Mailboxes
/** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
$folders = $client->getFolders();

//Loop through every Mailbox
/** @var \Webklex\PHPIMAP\Folder $folder */
foreach($folders as $folder){

    //Get all Messages of the current Mailbox $folder
    /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
    $messages = $folder->messages()->all()->get();
    
    /** @var \Webklex\PHPIMAP\Message $message */
    foreach($messages as $message){
        echo $message->getSubject().'<br />';
        echo 'Attachments: '.$message->getAttachments()->count().'<br />';
        echo $message->getHTMLBody();
        
        //Move the current Message to 'INBOX.read'
        if($message->move('INBOX.read') == true){
            echo 'Message has been moved';
        }else{
            echo 'Message could not be moved';
        }
    }
}
```

### Known issues
| Error                                                                      | Solution                                                                                |
|:---------------------------------------------------------------------------|:----------------------------------------------------------------------------------------|
| Kerberos error: No credentials cache file found (try running kinit) (...)  | Uncomment "DISABLE_AUTHENTICATOR" inside your config and use the `legacy-imap` protocol |

## License
The MIT License (MIT). Please see [License File][link-license] for more information.
