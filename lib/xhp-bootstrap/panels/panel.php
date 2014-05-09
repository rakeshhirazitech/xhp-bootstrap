<?hh

class :bootstrap:panel extends :bootstrap:base {
  attribute
    enum {
      'default',
      'primary',
      'success',
      'info',
      'warning',
      'danger'
    } use = 'default',
    :bootstrap:base;

  children (
    :bootstrap:panel:heading?,
    :bootstrap:panel:body?,
    :bootstrap:panel:footer?,
    :ui:base*
  );

  protected function render(): :xhp {
    $ret =
      <div class={$this->getAttribute('class')}>
        {$this->getChildren()}
      </div>;

    $ret->addClass('panel');
    $ret->addClass('panel-'.$this->getAttribute('use'));
    return $ret;
  }

  <<ExampleTitle('Secions usage')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:panel use="danger">
          <bootstrap:panel:heading>
            Help help
          </bootstrap:panel:heading>
          <bootstrap:panel:body>
            Something is wrong
          </bootstrap:panel:body>
          <bootstrap:panel:footer>
            And this is a footer
          </bootstrap:panel:footer>
        </bootstrap:panel>
      </x:frag>;
  }

  <<ExampleTitle('Mixing sections and content')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:panel use="danger">
          <bootstrap:panel:heading>
            Help help
          </bootstrap:panel:heading>
          <ul class="list-group">
            <li class="list-group-item">Item 1</li>
            <li class="list-group-item">Item 2</li>
          </ul>
        </bootstrap:panel>
      </x:frag>;
  }

}
