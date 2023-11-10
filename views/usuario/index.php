<table>
    <tr>
        <th>Login</th>
        <th>Nome</th>
    </tr>
    <?php foreach ($_REQUEST['usuarios'] as $usuario): ?>
    <tr>
        <td><?php echo $usuario->getLogin() ?></td>
        <td><?php echo $usuario->getNome() ?></td>
    <?php endforeach; ?>
</table>