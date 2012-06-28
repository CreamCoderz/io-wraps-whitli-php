# Whit.li API Client Library for PHP
###PHP client libraries created with Mashery I/O Wraps, a semi-automated native language SDK generator.

## What is the Whit.li API?
The Whit.li API rates the relevance of people, content, and brands. Whit.li divines rare interests, personality traits, derived demographics like life stage, and more, by scanning and analyzing social media activity using complex context-sensitive pattern-matching algorithms. The result is an easy-to-compare vector set.  This vector set can be used to compare two users to each other, to compare a user to a brand or to compare a user to content (like a news story).  The vector set is derived from several algorithms, including natural language processing applied to user generated content (such as Facebook posts and Twitter feeds).

Head over to [developer.whit.li](http://developer.whit.li) to learn more. You can register for instant access to their API, view their documentation, and even make live API calls with their interactive docs.

## Summary

An API client library (also known as an SDK or language wrapper) is an efficiency tool for programmer that helps bind external resources to your native programming language. Traditionally, to integrate an API into your project without a client library, you would need to do the following:

1. Construct a network request using a transport library (e.g. HTTP)

2. Integrate authentication flow and signatures (e.g. OAuth, MD5/SHA-256, etc.)

3. Construct and execute API calls manually, often a trial and error process while reading documentation

4. Parse through results

5. Lather. Rinse. Repeat.

## How does the client library help?
Client libraries make life easier by bringing the API into your native language environment. So, rather than making curl calls, piping the output into a variable, and parsing through the variable -- the client library handles the network connectivity, authorization and API call execution with syntax you're familiar with:

    // Initialize the client library
    $client = new apiClient();

    // Set your API key
    $client->setDeveloperKey("YOUR_KEY_HERE");

    // Connect client to the API
    $api = new apiService($client);

    // Make an API call and store the response in an object
    $responseObject = $api -> KeyMethods -> Get ("123","abc");

    // Pull out the "status" value from the response payload
    $status = $responseObject->getStatus();

Above is just a pseudo-PHP-code example of how this library works. If you'd like to see it in action, check out the example PHP files in this repo.

## Requirements
1. PHP - if you'd like a quick a dirty isolated LAMP stack, check out [XAMPP](http://www.apachefriends.org/en/xampp.html). Works on Mac, PC and even Linux.
2. Whit.li API key -- head over to [http://developer.whit.li](http://developer.whit.li) 

## IDE is optional, but nice
At Mashery, we love [vim](http://www.vim.org) just as much as the next guy, but when it comes to tool-tips, code-completion and general object-oriented goodness, IDEs can be really useful. [Eclipse](http://eclipse.org), [Aptana](http://aptana.com), [Netbeans](http://netbeans.org), [Komodo](http://www.activestate.com/komodo-ide), etc. They're all very mature and useful tools.

## Installation / Quick start guide
Follow the steps below for a quick start to using this client library:

1. Grab the latest source with git. 

    <pre>git clone git://github.com/mashery/io-wrap-whitli-php.git</pre>

2. Move the project source tree into your sandbox LAMP stack environment (anywhere below the httpdocs/htdocs level -- example code is relatively linked)

3. Head over to [Whit.li](http://developer.whit.li) to fetch an API key

4. Open up your editor and add your API key where you see *YOUR_KEY_HERE* on the sample PHP scripts.

5. Point your browser to one of the example files where this is deployed:

    <pre>Ex: http://localhost/io-wrap-whitli-php/whitli_get_key.php</pre>

## About / License
* No warranty expressed or implied. Software as is.
* [MIT License](http://www.opensource.org/licenses/mit-license.html)
* Lovingly created by [Mashery Dev](http://dev.mashery.com)
