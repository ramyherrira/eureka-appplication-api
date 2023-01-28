<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class srcTestDebugProjectContainer extends Container
{
    protected $parameters = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->methodMap = [
            'Application\\Controller\\Api\\Error\\ErrorController' => 'getErrorControllerService',
            'Application\\Controller\\Api\\Health\\HealthController' => 'getHealthControllerService',
            'Application\\Controller\\Api\\Home\\HomeController' => 'getHomeControllerService',
            'Eureka\\Kernel\\Http\\Middleware\\ControllerMiddleware' => 'getControllerMiddlewareService',
            'Eureka\\Kernel\\Http\\Middleware\\ErrorMiddleware' => 'getErrorMiddlewareService',
            'Eureka\\Kernel\\Http\\Middleware\\RateLimiterMiddleware' => 'getRateLimiterMiddlewareService',
            'Eureka\\Kernel\\Http\\Middleware\\ResponseTimeLoggerMiddleware' => 'getResponseTimeLoggerMiddlewareService',
            'Eureka\\Kernel\\Http\\Middleware\\RouterMiddleware' => 'getRouterMiddlewareService',
            'Symfony\\Component\\Routing\\Router' => 'getRouterService',
            'app.cache.default' => 'getApp_Cache_DefaultService',
            'response_factory' => 'getResponseFactoryService',
        ];
        $this->aliases = [
            'Eureka\\Kernel\\Http\\Controller\\ErrorControllerInterface' => 'Application\\Controller\\Api\\Error\\ErrorController',
            'request_factory' => 'response_factory',
            'router' => 'Symfony\\Component\\Routing\\Router',
            'server_request_factory' => 'response_factory',
            'stream_factory' => 'response_factory',
            'uri_factory' => 'response_factory',
        ];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'Eureka\\Component\\Http\\Server\\RequestHandler' => true,
            'Eureka\\Kernel\\Http\\Controller\\ControllerInterface' => true,
            'Eureka\\Kernel\\Http\\Controller\\ErrorController' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpBadRequestException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpConflictException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpForbiddenException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpInternalServerErrorException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpMethodNotAllowedException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpNotFoundException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpServiceUnavailableException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpTooManyRequestsException' => true,
            'Eureka\\Kernel\\Http\\Exception\\HttpUnauthorizedException' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\Counter\\CacheCounter' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\Counter\\CounterInterface' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\Exception\\QuotaExceededException' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\LimiterProvider\\RouteQuotaLimiterProvider' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\Limiter\\LimiterInterface' => true,
            'Eureka\\Kernel\\Http\\RateLimiter\\Limiter\\QuotaLimiter' => true,
            'Eureka\\Kernel\\Http\\Service\\DataCollection' => true,
            'Eureka\\Kernel\\Http\\Service\\IpResolver' => true,
            'Lcobucci\\Clock\\SystemClock' => true,
            'Nyholm\\Psr7\\Factory\\HttplugFactory' => true,
            'Nyholm\\Psr7\\Factory\\Psr17Factory' => true,
            'Nyholm\\Psr7\\Request' => true,
            'Nyholm\\Psr7\\Response' => true,
            'Nyholm\\Psr7\\ServerRequest' => true,
            'Nyholm\\Psr7\\UploadedFile' => true,
            'Nyholm\\Psr7\\Uri' => true,
            'Psr\\Clock\\ClockInterface' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Psr\\Http\\Message\\RequestFactoryInterface' => true,
            'Psr\\Http\\Message\\ResponseFactoryInterface' => true,
            'Psr\\Http\\Message\\ServerRequestFactoryInterface' => true,
            'Psr\\Http\\Message\\StreamFactoryInterface' => true,
            'Psr\\Http\\Message\\UriFactoryInterface' => true,
            'Psr\\Log\\InvalidArgumentException' => true,
            'Psr\\Log\\LogLevel' => true,
            'Psr\\Log\\LoggerInterface' => true,
            'Psr\\Log\\NullLogger' => true,
            'Psr\\Log\\Test\\DummyTest' => true,
            'Psr\\Log\\Test\\TestLogger' => true,
            'Symfony\\Component\\Cache\\Adapter\\ArrayAdapter' => true,
            'Symfony\\Component\\Config\\Builder\\ClassBuilder' => true,
            'Symfony\\Component\\Config\\Builder\\ConfigBuilderGenerator' => true,
            'Symfony\\Component\\Config\\Builder\\ConfigBuilderGeneratorInterface' => true,
            'Symfony\\Component\\Config\\Builder\\Method' => true,
            'Symfony\\Component\\Config\\Builder\\Property' => true,
            'Symfony\\Component\\Config\\ConfigCache' => true,
            'Symfony\\Component\\Config\\ConfigCacheFactory' => true,
            'Symfony\\Component\\Config\\Definition\\ArrayNode' => true,
            'Symfony\\Component\\Config\\Definition\\BooleanNode' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\ArrayNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\BooleanNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\BuilderAwareInterface' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\EnumNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\ExprBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\FloatNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\IntegerNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\MergeBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\NodeBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\NormalizationBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\ParentNodeDefinitionInterface' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\ScalarNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\TreeBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\ValidationBuilder' => true,
            'Symfony\\Component\\Config\\Definition\\Builder\\VariableNodeDefinition' => true,
            'Symfony\\Component\\Config\\Definition\\Dumper\\XmlReferenceDumper' => true,
            'Symfony\\Component\\Config\\Definition\\Dumper\\YamlReferenceDumper' => true,
            'Symfony\\Component\\Config\\Definition\\EnumNode' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\DuplicateKeyException' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\Exception' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\ForbiddenOverwriteException' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\InvalidConfigurationException' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\InvalidDefinitionException' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\InvalidTypeException' => true,
            'Symfony\\Component\\Config\\Definition\\Exception\\UnsetKeyException' => true,
            'Symfony\\Component\\Config\\Definition\\FloatNode' => true,
            'Symfony\\Component\\Config\\Definition\\IntegerNode' => true,
            'Symfony\\Component\\Config\\Definition\\NumericNode' => true,
            'Symfony\\Component\\Config\\Definition\\Processor' => true,
            'Symfony\\Component\\Config\\Definition\\PrototypedArrayNode' => true,
            'Symfony\\Component\\Config\\Definition\\ScalarNode' => true,
            'Symfony\\Component\\Config\\Definition\\VariableNode' => true,
            'Symfony\\Component\\Config\\Exception\\FileLoaderImportCircularReferenceException' => true,
            'Symfony\\Component\\Config\\Exception\\FileLocatorFileNotFoundException' => true,
            'Symfony\\Component\\Config\\Exception\\LoaderLoadException' => true,
            'Symfony\\Component\\Config\\FileLocator' => true,
            'Symfony\\Component\\Config\\FileLocatorInterface' => true,
            'Symfony\\Component\\Config\\Loader\\DelegatingLoader' => true,
            'Symfony\\Component\\Config\\Loader\\GlobFileLoader' => true,
            'Symfony\\Component\\Config\\Loader\\LoaderInterface' => true,
            'Symfony\\Component\\Config\\Loader\\LoaderResolver' => true,
            'Symfony\\Component\\Config\\Loader\\LoaderResolverInterface' => true,
            'Symfony\\Component\\Config\\Loader\\ParamConfigurator' => true,
            'Symfony\\Component\\Config\\ResourceCheckerConfigCache' => true,
            'Symfony\\Component\\Config\\ResourceCheckerConfigCacheFactory' => true,
            'Symfony\\Component\\Config\\ResourceCheckerInterface' => true,
            'Symfony\\Component\\Config\\Resource\\ClassExistenceResource' => true,
            'Symfony\\Component\\Config\\Resource\\ComposerResource' => true,
            'Symfony\\Component\\Config\\Resource\\DirectoryResource' => true,
            'Symfony\\Component\\Config\\Resource\\FileExistenceResource' => true,
            'Symfony\\Component\\Config\\Resource\\FileResource' => true,
            'Symfony\\Component\\Config\\Resource\\GlobResource' => true,
            'Symfony\\Component\\Config\\Resource\\ReflectionClassResource' => true,
            'Symfony\\Component\\Config\\Resource\\SelfCheckingResourceChecker' => true,
            'Symfony\\Component\\Config\\Util\\Exception\\InvalidXmlException' => true,
            'Symfony\\Component\\Config\\Util\\Exception\\XmlParsingException' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'Symfony\\Component\\Routing\\Alias' => true,
            'Symfony\\Component\\Routing\\Annotation\\Route' => true,
            'Symfony\\Component\\Routing\\CompiledRoute' => true,
            'Symfony\\Component\\Routing\\DependencyInjection\\RoutingResolverPass' => true,
            'Symfony\\Component\\Routing\\Exception\\InvalidArgumentException' => true,
            'Symfony\\Component\\Routing\\Exception\\InvalidParameterException' => true,
            'Symfony\\Component\\Routing\\Exception\\MethodNotAllowedException' => true,
            'Symfony\\Component\\Routing\\Exception\\MissingMandatoryParametersException' => true,
            'Symfony\\Component\\Routing\\Exception\\NoConfigurationException' => true,
            'Symfony\\Component\\Routing\\Exception\\ResourceNotFoundException' => true,
            'Symfony\\Component\\Routing\\Exception\\RouteCircularReferenceException' => true,
            'Symfony\\Component\\Routing\\Exception\\RouteNotFoundException' => true,
            'Symfony\\Component\\Routing\\Exception\\RuntimeException' => true,
            'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator' => true,
            'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper' => true,
            'Symfony\\Component\\Routing\\Generator\\Dumper\\GeneratorDumperInterface' => true,
            'Symfony\\Component\\Routing\\Generator\\UrlGenerator' => true,
            'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\ClosureLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\Configurator\\AliasConfigurator' => true,
            'Symfony\\Component\\Routing\\Loader\\Configurator\\CollectionConfigurator' => true,
            'Symfony\\Component\\Routing\\Loader\\Configurator\\ImportConfigurator' => true,
            'Symfony\\Component\\Routing\\Loader\\Configurator\\RouteConfigurator' => true,
            'Symfony\\Component\\Routing\\Loader\\Configurator\\RoutingConfigurator' => true,
            'Symfony\\Component\\Routing\\Loader\\ContainerLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\DirectoryLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\GlobFileLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\PhpFileLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\XmlFileLoader' => true,
            'Symfony\\Component\\Routing\\Loader\\YamlFileLoader' => true,
            'Symfony\\Component\\Routing\\Matcher\\CompiledUrlMatcher' => true,
            'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper' => true,
            'Symfony\\Component\\Routing\\Matcher\\Dumper\\MatcherDumperInterface' => true,
            'Symfony\\Component\\Routing\\Matcher\\Dumper\\StaticPrefixCollection' => true,
            'Symfony\\Component\\Routing\\Matcher\\ExpressionLanguageProvider' => true,
            'Symfony\\Component\\Routing\\Matcher\\TraceableUrlMatcher' => true,
            'Symfony\\Component\\Routing\\Matcher\\UrlMatcher' => true,
            'Symfony\\Component\\Routing\\RequestContext' => true,
            'Symfony\\Component\\Routing\\Route' => true,
            'Symfony\\Component\\Routing\\RouteCollection' => true,
            'Symfony\\Component\\Routing\\RouteCollectionBuilder' => true,
            'Symfony\\Component\\Routing\\RouteCompiler' => true,
            'Symfony\\Component\\Routing\\RouteCompilerInterface' => true,
            'Symfony\\Component\\Routing\\RouterInterface' => true,
        ];
    }

    /**
     * Gets the public 'Application\Controller\Api\Error\ErrorController' shared autowired service.
     *
     * @return \Application\Controller\Api\Error\ErrorController
     */
    protected function getErrorControllerService()
    {
        $this->services['Application\\Controller\\Api\\Error\\ErrorController'] = $instance = new \Application\Controller\Api\Error\ErrorController();

        $a = ($this->services['response_factory'] ?? ($this->services['response_factory'] = new \Nyholm\Psr7\Factory\Psr17Factory()));

        $instance->setRouter(($this->services['Symfony\\Component\\Routing\\Router'] ?? $this->getRouterService()));
        $instance->setResponseFactory($a);
        $instance->setRequestFactory($a);
        $instance->setServerRequestFactory($a);
        $instance->setStreamFactory($a);
        $instance->setUriFactory($a);

        return $instance;
    }

    /**
     * Gets the public 'Application\Controller\Api\Health\HealthController' shared autowired service.
     *
     * @return \Application\Controller\Api\Health\HealthController
     */
    protected function getHealthControllerService()
    {
        $this->services['Application\\Controller\\Api\\Health\\HealthController'] = $instance = new \Application\Controller\Api\Health\HealthController();

        $a = ($this->services['response_factory'] ?? ($this->services['response_factory'] = new \Nyholm\Psr7\Factory\Psr17Factory()));

        $instance->setRouter(($this->services['Symfony\\Component\\Routing\\Router'] ?? $this->getRouterService()));
        $instance->setResponseFactory($a);
        $instance->setRequestFactory($a);
        $instance->setServerRequestFactory($a);
        $instance->setStreamFactory($a);
        $instance->setUriFactory($a);

        return $instance;
    }

    /**
     * Gets the public 'Application\Controller\Api\Home\HomeController' shared autowired service.
     *
     * @return \Application\Controller\Api\Home\HomeController
     */
    protected function getHomeControllerService()
    {
        $this->services['Application\\Controller\\Api\\Home\\HomeController'] = $instance = new \Application\Controller\Api\Home\HomeController();

        $a = ($this->services['response_factory'] ?? ($this->services['response_factory'] = new \Nyholm\Psr7\Factory\Psr17Factory()));

        $instance->setRouter(($this->services['Symfony\\Component\\Routing\\Router'] ?? $this->getRouterService()));
        $instance->setResponseFactory($a);
        $instance->setRequestFactory($a);
        $instance->setServerRequestFactory($a);
        $instance->setStreamFactory($a);
        $instance->setUriFactory($a);

        return $instance;
    }

    /**
     * Gets the public 'Eureka\Kernel\Http\Middleware\ControllerMiddleware' shared autowired service.
     *
     * @return \Eureka\Kernel\Http\Middleware\ControllerMiddleware
     */
    protected function getControllerMiddlewareService()
    {
        return $this->services['Eureka\\Kernel\\Http\\Middleware\\ControllerMiddleware'] = new \Eureka\Kernel\Http\Middleware\ControllerMiddleware($this);
    }

    /**
     * Gets the public 'Eureka\Kernel\Http\Middleware\ErrorMiddleware' shared autowired service.
     *
     * @return \Eureka\Kernel\Http\Middleware\ErrorMiddleware
     */
    protected function getErrorMiddlewareService()
    {
        return $this->services['Eureka\\Kernel\\Http\\Middleware\\ErrorMiddleware'] = new \Eureka\Kernel\Http\Middleware\ErrorMiddleware(($this->services['Application\\Controller\\Api\\Error\\ErrorController'] ?? $this->getErrorControllerService()));
    }

    /**
     * Gets the public 'Eureka\Kernel\Http\Middleware\RateLimiterMiddleware' shared autowired service.
     *
     * @return \Eureka\Kernel\Http\Middleware\RateLimiterMiddleware
     */
    protected function getRateLimiterMiddlewareService()
    {
        return $this->services['Eureka\\Kernel\\Http\\Middleware\\RateLimiterMiddleware'] = new \Eureka\Kernel\Http\Middleware\RateLimiterMiddleware(($this->services['app.cache.default'] ?? ($this->services['app.cache.default'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter(100))), new \Eureka\Kernel\Http\Service\IpResolver());
    }

    /**
     * Gets the public 'Eureka\Kernel\Http\Middleware\ResponseTimeLoggerMiddleware' shared autowired service.
     *
     * @return \Eureka\Kernel\Http\Middleware\ResponseTimeLoggerMiddleware
     */
    protected function getResponseTimeLoggerMiddlewareService()
    {
        return $this->services['Eureka\\Kernel\\Http\\Middleware\\ResponseTimeLoggerMiddleware'] = new \Eureka\Kernel\Http\Middleware\ResponseTimeLoggerMiddleware(($this->privates['Psr\\Log\\NullLogger'] ?? ($this->privates['Psr\\Log\\NullLogger'] = new \Psr\Log\NullLogger())), 'appname');
    }

    /**
     * Gets the public 'Eureka\Kernel\Http\Middleware\RouterMiddleware' shared autowired service.
     *
     * @return \Eureka\Kernel\Http\Middleware\RouterMiddleware
     */
    protected function getRouterMiddlewareService()
    {
        return $this->services['Eureka\\Kernel\\Http\\Middleware\\RouterMiddleware'] = new \Eureka\Kernel\Http\Middleware\RouterMiddleware(($this->services['Symfony\\Component\\Routing\\Router'] ?? $this->getRouterService()));
    }

    /**
     * Gets the public 'Symfony\Component\Routing\Router' shared autowired service.
     *
     * @return \Symfony\Component\Routing\Router
     */
    protected function getRouterService()
    {
        return $this->services['Symfony\\Component\\Routing\\Router'] = new \Symfony\Component\Routing\Router(new \Symfony\Component\Routing\Loader\YamlFileLoader(new \Symfony\Component\Config\FileLocator('/home/ymar/projects/d4c-backend-test-master/config')), '/home/ymar/projects/d4c-backend-test-master/config/routes/routes_test.yaml', ['cache_dir' => '/home/ymar/projects/d4c-backend-test-master/var/cache/test', 'debug' => true], new \Symfony\Component\Routing\RequestContext(), ($this->privates['Psr\\Log\\NullLogger'] ?? ($this->privates['Psr\\Log\\NullLogger'] = new \Psr\Log\NullLogger())));
    }

    /**
     * Gets the public 'app.cache.default' shared autowired service.
     *
     * @return \Symfony\Component\Cache\Adapter\ArrayAdapter
     */
    protected function getApp_Cache_DefaultService()
    {
        return $this->services['app.cache.default'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter(100);
    }

    /**
     * Gets the public 'response_factory' shared autowired service.
     *
     * @return \Nyholm\Psr7\Factory\Psr17Factory
     */
    protected function getResponseFactoryService()
    {
        return $this->services['response_factory'] = new \Nyholm\Psr7\Factory\Psr17Factory();
    }

    /**
     * @return array|bool|float|int|string|\UnitEnum|null
     */
    public function getParameter(string $name)
    {
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || \array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter(string $name): bool
    {
        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || \array_key_exists($name, $this->parameters);
    }

    public function setParameter(string $name, $value): void
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag(): ParameterBagInterface
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    private function getDynamicParameter(string $name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    protected function getDefaultParameters(): array
    {
        return [
            'kernel.debug' => true,
            'kernel.environment' => 'test',
            'kernel.error.display' => 'true',
            'kernel.error.reporting' => 32767,
            'kernel.directory.root' => '/home/ymar/projects/d4c-backend-test-master',
            'kernel.directory.cache' => '/home/ymar/projects/d4c-backend-test-master/var/cache',
            'kernel.directory.log' => '/home/ymar/projects/d4c-backend-test-master/var/log',
            'kernel.directory.config' => '/home/ymar/projects/d4c-backend-test-master/config',
            'kernel.directory.vendor' => '/home/ymar/projects/d4c-backend-test-master/vendor',
            'app.secret.database.host' => 'localhost',
            'app.secret.database.schema' => 'schema',
            'app.secret.database.username' => 'username',
            'app.secret.database.password' => 'password',
            'app.database.common' => [
                'dsn' => 'mysql:dbname=schema;host=localhost;charset=UTF8',
                'username' => 'username',
                'password' => 'password',
                'options' => [
                    1002 => 'SET NAMES \'UTF8\'',
                ],
            ],
            'app.middleware' => [
                'timeLogger' => 'Eureka\\Kernel\\Http\\Middleware\\ResponseTimeLoggerMiddleware',
                'error' => 'Eureka\\Kernel\\Http\\Middleware\\ErrorMiddleware',
                'router' => 'Eureka\\Kernel\\Http\\Middleware\\RouterMiddleware',
                'rateLimiter' => 'Eureka\\Kernel\\Http\\Middleware\\RateLimiterMiddleware',
                'controller' => 'Eureka\\Kernel\\Http\\Middleware\\ControllerMiddleware',
            ],
            'app.name' => 'appname',
            'app.version' => '1.0.0',
        ];
    }
}
