<?php

class HTMLPage
{
    private string $title;
    private array $heads = [];
    private array $stylesheets = [];
    private array $scripts = [];
    private array $rawStyles = [];
    private array $rawScripts = [];
    private array $bodyAttributes = [];
    private string $content = '';

    public function __construct(string $title = 'Untitled Page')
    {
        $this->title = $title;
    }

    public function setupBootstrap(array $bodyAttributes = []): self
    {
        foreach ($bodyAttributes as $name => $value) {
            $this->addBodyAttribute($name, $value);
        }
        $this->addHead('<meta charset="utf-8">');
        $this->addHead('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
        $this->addHead(<<<HTML
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
HTML);
        $this->addHead(<<<HTML
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
HTML);
        return $this;
    }

    public function setupTailwind(): self
    {
        $this->addScript("https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4");
        return $this;
    }

    public function setupNavigationTransition(): self
    {
        $this->addRawStyle("@view-transition {navigation: auto;}");

        return $this;
    }

    public function addHead(string $head): self
    {
        $this->heads[] = $head;
        return $this;
    }

    public function addStylesheet(string $href): self
    {
        $this->stylesheets[] = $href;
        return $this;
    }

    public function addScript(string $src): self
    {
        $this->scripts[] = $src;
        return $this;
    }

    public function addContent(string $content): self
    {
        $this->content .= $content;
        return $this;
    }

    public function addRawStyle(string $style): self
    {
        $this->rawStyles[] = $style;
        return $this;
    }

    public function addRawScript(string $script): self
    {
        $this->rawScripts[] = $script;
        return $this;
    }

    public function addBodyAttribute(string $name, string $value): self
    {
        $this->bodyAttributes[$name] = $value;
        return $this;
    }

    public function render(): string
    {
        $headsHtml = '';
        foreach ($this->heads as $head) {
            $headsHtml .= $head . "\n";
        }

        $stylesheetsHtml = '';
        foreach ($this->stylesheets as $href) {
            $stylesheetsHtml .= "<link rel=\"stylesheet\" href=\"$href\">\n";
        }

        $rawStylesHtml = '';
        foreach ($this->rawStyles as $style) {
            $rawStylesHtml .= <<<HTML
<style type="text/css">
$style
</style>
HTML;
        }

        $scriptsHtml = '';
        foreach ($this->scripts as $src) {
            $scriptsHtml .= "<script src=\"$src\"></script>\n";
        }

        $rawScriptsHtml = '';
        foreach ($this->rawScripts as $script) {
            $rawScriptsHtml .= <<<HTML
<script type="text/javascript">
$script
</script>
HTML;
        }

        $bodyAttributes = '';
        if (!empty($this->bodyAttributes)) {
            $attributes = [];
            foreach ($this->bodyAttributes as $name => $value) {
                $attributes[] = $name . '="' . htmlspecialchars($value, ENT_QUOTES) . '"';
            }
            $bodyAttributes = implode(' ', $attributes);
        }

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
    <head>
        $headsHtml
        $stylesheetsHtml
        $rawStylesHtml
        <title>{$this->title}</title>
    </head>
    <body $bodyAttributes>
        {$this->content}
        $scriptsHtml
        $rawScriptsHtml
    </body>
</html>
HTML;
    }
}
