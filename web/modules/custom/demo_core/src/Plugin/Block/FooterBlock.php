<?php

namespace Drupal\demo_core\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Psr\Container\ContainerInterface;

/**
 * Provides a footer block.
 *
 * @Block(
 *   id = "demo_core_footer",
 *   admin_label = @Translation("Footer"),
 *   category = @Translation("Custom")
 * )
 */
class FooterBlock extends BlockBase implements ContainerFactoryPluginInterface {


  /**
   * Constructs a \Drupal\Component\Plugin\PluginBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, $logger_factory, $messenger) {
    $this->configuration = $configuration;
    $this->pluginId = $plugin_id;
    $this->pluginDefinition = $plugin_definition;
    $this->loggerFactory = $logger_factory;
    $this->messenger = $messenger;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('logger.factory'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $this->loggerFactory->get('demo_core')->notice('Rendered block with dependency injection');

    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
