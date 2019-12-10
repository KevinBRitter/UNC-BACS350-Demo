<h1>PHP Code Generator</h1>

<p>This code generator must be run from a console window. Get the Github Repo and
    run the code in "demo/38". </p>


<pre>
# Create a PHP file based on a standard code template
def generate(datatype):
    text = open('code_template.php').read()
    text = text.replace('{{ datatype }}', datatype)
    with open(datatype+'.php', 'w') as f:
        f.write(text)
        

generate('note')
generate('slide')
generate('superhero')
generate('docman')
generate('review')
generate('subscribe')

</pre>
